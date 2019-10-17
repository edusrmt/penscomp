// Instância de jogo utilizando Phaser.js
const game = new Phaser.Game({
    type: Phaser.AUTO,
    width: 800,
    height: 426,
    parent: "game-container", // ID da div container do jogo
    scene: {
        preload: preload,
        create: create,
        update: update
    }
});

// Escala para renderizar o jogo
// 800 - Largura da div em pixels
// 128 - Largura da sprite em pixels
// 30 - Quantidade de espaços por linha no tabuleiro
//const SCALE = 800 / (128 * 30);
const SCALE = 800 / (128 * 30);

// Váriaveis 'globais'
var pid;
var worldLayer;
var player;
var sides = ["DOWN", "RIGHT", "UP", "LEFT"];
var currentSide = 1;

function preload() {
    // Pré-carregamento das imagens que serão utilizadas

    //this.load.image("tiles", "src/tileset.png");
    this.load.image("tiles", "src/tileset2.png");
    this.load.image("player", "src/player.png")
}

// Não necessário para essa aplicação
function update(time, delta) {}

function create() {
    // Matriz que representa o mapa, cada número representa o index da lista de imagens no tileset
    const level = [
      [  23,23,  23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23,],
      [  23,23,  23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23,],

      [  23,23,    4,0,  0,0,   0,0,   0,0,   0,0,   0,0,   0,0,   0,0,   0,0,   0,0,   11,0,   0,0,   0,5, 23,23,],
      [  23,23,   2,12,  1,1,   1,1,   1,1,   1,1,   1,1,   1,1,   1,1,   1,1,   1,1,   10,1,   1,1,  13,3, 23,23,],

      [  23,23,   2,3, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23,  23,23, 23,23,   2,3, 23,23,],
      [  23,23,   2,3, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23,  23,23, 23,23,   2,3, 23,23,],

      [  23,23,   2,3, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23,  23,23, 23,23,   2,3, 23,23,],
      [  23,23,   2,3, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23,  23,23, 23,23,   2,3, 23,23,],

      [  23,23,  2,14,   0,0,   0,0,   0,0,   0,0,   0,5, 23,23, 23,23, 23,23,   4,0,    0,0,   0,0,  15,3, 23,23,],
      [  23,23,   6,1,   1,1,   1,1,   1,1,   1,1,  13,3, 23,23, 23,23, 23,23,  2,12,    1,1,   1,1,   1,7, 23,23,],

      [  23,23, 23,23, 23,23, 23,23, 23,23, 23,23,   2,3, 23,23, 23,23, 23,23,   2,3,  23,23, 23,23, 23,23, 23,23,],
      [  23,23, 23,23, 23,23, 23,23, 23,23, 23,23,   2,3, 23,23, 23,23, 23,23,   2,3,  23,23, 23,23, 23,23, 23,23,],

      [  23,23, 23,23, 23,23, 23,23, 23,23, 23,23,  2,14,   0,0,   0,0,   0,0,  15,3,  23,23, 23,23, 23,23, 23,23,],
      [  23,23, 23,23, 23,23, 23,23, 23,23, 23,23,   6,1,   1,1,   1,1,   1,1,   1,7,  23,23, 23,23, 23,23, 23,23,],

      [  23,23,  23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23,],
      [  23,23,  23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23, 23,23,],
    ];

    // Cria o mapa utilizando os dados da matriz e o tamanho em pixels de cada tile
    // const map = this.make.tilemap({ data: level, tileWidth: 32, tileHeight: 32 });
    const map = this.make.tilemap({ data: level, tileWidth: 128, tileHeight: 128 });
    // Adiciona a imagem source que representa os tiles no mapa
    const tiles = map.addTilesetImage("tiles");
    // Cria uma camada com o mapa representado pela matriz
    worldLayer = map.createStaticLayer(0, tiles, 0, 0);

    // Adiciona o player ao jogo
    // 576 - X
    // 96  - Y
    player = this.add.image(576, 96, "player");
    player.angle = 90;

    // Define as escalas dos objetos do jogo
    worldLayer.setScale(SCALE);
    player.setScale(SCALE*4)
}

// "API" Usada para passar funções locais para o interpretador dos blocos do Blockly
function initApi(interpreter, scope) {
    // Função para fazer os blocos brilharem
    var wrapper = function(id) {
      id = id ? id.toString() : '';
      return interpreter.createPrimitive(highlightBlock(id));
    };
    interpreter.setProperty(scope, 'highlightBlock',
        interpreter.createNativeFunction(wrapper));

    // Funções locais para funções do interpreter
    var intTurn = function(angle) { return turn(angle); }
    interpreter.setProperty(scope, 'turn',
    interpreter.createNativeFunction(intTurn));
    var intMove = function() { return moveForward(); }
    interpreter.setProperty(scope, 'moveForward',
    interpreter.createNativeFunction(intMove));
    var intGetTile = function() { return getTile(); }
    interpreter.setProperty(scope, 'getTile',
    interpreter.createNativeFunction(intGetTile));
    var intAlert = function(value) { return alert(value); }
    interpreter.setProperty(scope, 'alert',
    interpreter.createNativeFunction(intAlert));
    var intReset = function() { return reset(); }
    interpreter.setProperty(scope, 'reset',
    interpreter.createNativeFunction(intReset));
}

function highlightBlock(id) {
    workspace.highlightBlock(id);
}

// Funcão de execução do código Blockly
function run() {
    // Código adicionado ao código do Blockly para não ocorrer um  while(True)
    window.LoopTrap = 1000;
    Blockly.JavaScript.INFINITE_LOOP_TRAP = 'if(--window.LoopTrap == 0) throw "Infinite loop.";\n';
    // Chama a função de brilhar blocos nas execução
    Blockly.JavaScript.STATEMENT_PREFIX = 'highlightBlock(%1);\n';
    // Transforma os blocos em código JavaScript
    var code = Blockly.JavaScript.workspaceToCode(workspace);
    // Cria o interpreter com o código e a API
    var myInterpreter = new Interpreter(code, initApi);

    pid = 0; // PID serve para registrar e posteriormente possibilitar quebrar o loop de execução do código
    // Chama o próximo bloco em código para executar
    function nextStep() {
        if (myInterpreter.step()) {
            pid = window.setTimeout(nextStep, 0);

            // Teste de vitória
            if(getTile() === 10 || getTile() === 11) {
                console.log("Ganhou");
                reset();
            }
            // Teste de derrota
            if(getTile() === 23) {
                console.log("Perdeu");
                reset();
            }
        }
    }
    nextStep();
}

// Chamada na execução dos blocos
function moveForward() {
    let destination = {"x": player.x, "y": player.y};

    // Decide para que lado adicionar pixels na posição do player, dependendo para onde está olhando atualmente
    switch(sides[currentSide]) {
        case "DOWN":
            destination.y += 32;
            break;
        case "RIGHT":
            destination.x -= 32;
            break;
        case "UP":
            destination.y -= 32;
            break;
        case "LEFT":
            destination.x += 32;
            break;
    }


    // var tile = worldLayer.getTileAtWorldXY(destination.x, destination.y, true);
    // if( tile.index === 23 ) {
    //     //alert("Você Perdeu");
    // }



    // Atualiza a posição do player
    player.x = destination.x;
    player.y = destination.y;
}

// Chamada na execução dos blocos
function turn(angle) {
    // Define para que lado o player está olhando
    if(angle > 0) {
        currentSide = currentSide + 1 > 3 ? 0 : currentSide + 1;
    } else {
        currentSide = currentSide - 1 < 0 ? 3 : currentSide - 1;
    }
    // Vira a sprite do player para o lado desejado
    player.angle += angle;
}

// Função de utilidade, retorna o tipo de tile (0, 1, 2) encontrado na posição do player
function getTile() {
    return worldLayer.getTileAtWorldXY(player.x, player.y, true).index;
}

// Reseta o jogo e quebra o loop do Código
// NÃO GENÉRICO - RESETA O ANGULO DO PLAYER PARA OLHAR PARA BAIXO
function reset() {
    window.clearTimeout(pid);
    currentSide = 1;
    player.angle = 90;
    player.x = 576;
    player.y = 96;
}
