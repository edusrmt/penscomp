// Importações dos interpretadores para o funcionamento do blockly
global.acorn = require('js-interpreter/acorn');
const JS_Interpreter = require('js-interpreter/interpreter');

// Classe que representa a área utilizável do blockly
class Workspace {

    constructor(xml) {
        // XML que representa o toolbox do Blockly
        this.xml = xml || `<xml id="toolbox" style="display: none">
                    <block type="move_forward"></block>
                    <block type="turn">
                        <field name="SIDE">RIGHT</field>
                    </block>
                    <block type="turn">
                        <field name="SIDE">LEFT</field>
                    </block>
                    <block type="repeat_until_end"></block>
                </xml>`;
        this.workspace = null;
        // PID - Número de registro de ação atual do código do Blockly, usado para parar a execução
        this.pid = 0;
        // Funções locais que serão repassadas para a api
        this.apiFuncs = {};

        this.interpreter = null;

        this.highlightPause = false;

        this.timeout = 500;
    }
    // Injeta a toolbox em uma div do HTML com o ID de 'blockly'
    inject() {
        this.workspace = Blockly.inject('blockly', {toolbox: Blockly.Xml.textToDom(this.xml)});
    }

    // PROV
    run() {
        this.stop();
        window.LoopTrap = 1000;
        Blockly.JavaScript.INFINITE_LOOP_TRAP = 'if(--window.LoopTrap == 0) throw "Infinite loop.";\n';
        Blockly.JavaScript.STATEMENT_PREFIX = 'highlightBlock(%1);\n';
        var code = Blockly.JavaScript.workspaceToCode(this.workspace);
        this.interpreter = new JS_Interpreter.Interpreter(code, this.api.bind(this));
        this.interpreter.run();
        this.stop();
        // if(!this.interpreter) {
        //     this.stop();
        //
        //     window.LoopTrap = 1000;
        //     Blockly.JavaScript.INFINITE_LOOP_TRAP = 'if(--window.LoopTrap == 0) throw "Infinite loop.";\n';
        //     Blockly.JavaScript.STATEMENT_PREFIX = 'highlightBlock(%1);\n';
        //     var code = Blockly.JavaScript.workspaceToCode(this.workspace);
        //     this.interpreter = new JS_Interpreter.Interpreter(code, this.api.bind(this));
        //
        //     setTimeout(function() {
        //         // console.log('Ready to execute the following code\n' +
        //         // '===================================\n' + code);
        //         this.highlightPause = true;
        //         //this.step();
        //     }.bind(this), 1);
        //
        //     this.run();
        // } else {
        //     this.pid = setTimeout(function() {
        //         this.run();
        //         this.step();
        //     }.bind(this), this.timeout);
        // }
    }

    stop() {
        this.interpreter = null;
        this.highlightPause = false;
        this.workspace.highlightBlock(null);
        clearTimeout(this.pid);
    }

    step() {
        this.highlightPause = false;
        do {
            try {
                var hasMoreCode = this.interpreter.step();
            } finally {
                if (!hasMoreCode) {
                    this.stop();
                    return;
                }
            }
        } while (hasMoreCode && !this.highlightPause);
    }

    // PROV
    api(interpreter, scope) {
        var wrapper = function(id) {
          id = id ? id.toString() : '';
          return interpreter.createPrimitive(this.highlightBlock(id));
        }.bind(this);
        interpreter.setProperty(scope, 'highlightBlock',
            interpreter.createNativeFunction(wrapper));

        for (var name in this.apiFuncs) {
            let obj = this.apiFuncs[name];
            let n = name;
            //PROV
            interpreter.setProperty(scope, name, interpreter.createNativeFunction(
                (fname, param=null) => {
                    return obj[n](fname, param);
                }
            ));
        }
    }

    // PROV
    addToApi(name, object) {
        this.apiFuncs[name] = object;
    }

    // PROV
    highlightBlock(id) {
        this.workspace.highlightBlock(id);
        this.highlightPause = true;
    }

}

export { Workspace };
