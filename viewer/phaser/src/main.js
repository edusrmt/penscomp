// Importações CORE
import 'phaser';
import 'blockly';
// Importações extras
import { Game } from 'Game';
import { Boot } from 'Boot';
// Configuração do Phaser
const config = {
    title: "Game",
    width: 600,
    height: 600,
    pixelArt: true, // Para utilizar tilemaps sem problemas de renderização
    parent: "phaser",
    backgroundColor: "#18216D",
    scene: [
        Boot,
        Game
    ]
};

// PROV
Blockly.Blocks['repeat_until_end'] = {
    init: function() {
        this.jsonInit({
            "type": "controls_repeat_ext",
            "message0": "repetir até %1",
            "message1": "faça %1",
            "args0": [
                {
                    "type": "field_image",
                    "src": "assets/sprites/carrinho.png",
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
Blockly.JavaScript['repeat_until_end'] = function(block) {
    var branch = Blockly.JavaScript.statementToCode(block, 'DO');
    branch = Blockly.JavaScript.addLoopTrap(branch, block.id);
    return 'while (true) { \n' + branch + '}\n';
};
Blockly.JavaScript['move_forward'] = function(block) {
    return "addForExecution('movement');\n";
};
Blockly.JavaScript['turn'] = function(block) {
    switch(block.getFieldValue("SIDE")) {
        case "LEFT":
            return "addForExecution('turn', false);\n";
            break;
        case "RIGHT":
            return "addForExecution('turn', true);\n";
            break;
        default:
            break;
    }
};

// Criação da instância do Phaser
const game = new Phaser.Game(config);
