// Definição de blocos personalizados do blockly em JSON
Blockly.Blocks['repeat_until_end'] = {
    init: function() {
        this.jsonInit({
            "type": "controls_repeat_ext",
            "message0": "repetir até %1",
            "message1": "faça %1",
            "args0": [
                {
                    "type": "field_image",
                    "src": "src/flag.png",
                    "width": 15,
                    "height": 15,
                    "alt": "*"
                }
            ],
            "args1": [
                {"type": "input_statement", "name": "DO"}
            ],
            "previousStatement": null,
            "nextStatement": null,
            "colour": 120
        })
    }
}
Blockly.Blocks['move_forward'] = {
    init: function() {
        this.jsonInit({
            "type": "move_forward",
            "message0": 'andar',
            "previousStatement": null,
            "nextStatement": null,
            "colour": 160
        });
    }
};
Blockly.Blocks['turn'] = {
    init: function() {
        this.jsonInit({
            "type": "turn",
            "message0": 'virar à %1',
            "args0": [
                {
                    "type": "field_dropdown",
                    "name": "SIDE",
                    "options": [
                        [ "direita", "RIGHT" ],
                        [ "esquerda", "LEFT" ]
                    ]
                }
            ],
            "previousStatement": null,
            "nextStatement": null,
            "colour": 160
        });
    }
};

// Código para os respectivos blocos personalizados criados anteriormente
Blockly.JavaScript['repeat_until_end'] = function(block) {
    var branch = Blockly.JavaScript.statementToCode(block, 'DO');
    branch = Blockly.JavaScript.addLoopTrap(branch, block.id);
    return 'var countAux = 0;\nwhile (countAux <= 20) { \n' + branch + ' \ncountAux += 1; \n}\n';
};
Blockly.JavaScript['move_forward'] = function(block) {
    return "moveForward();\n";
};
Blockly.JavaScript['turn'] = function(block) {
    switch(block.getFieldValue("SIDE")) {
        case "LEFT":
            return "turn(-90);\n";
            break;
        case "RIGHT":
            return "turn(90);\n";
            break;
        default:
            break;
    }
};

// Instancia a área interativa do blockly utilizando as informações dos novoc blocos chamados no toolbox
var workspace = Blockly.inject('blocklyDiv', {toolbox: document.getElementById('toolbox')});
