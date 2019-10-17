// GameObject deriva da classe Sprite do Phaser
class GameObject extends Phaser.GameObjects.Sprite {
    constructor(scene, id, pixelX, pixelY, key) {
        // Passa os parâmetros para o super (Phaser.GameObjects.Sprite)
        super(scene, pixelX, pixelY, key);
        // Atributos do objeto
        this.id = id;
        this.scene = scene;

        // Informações de tile do mundo
        this.tileSize = this.scene.world.tileWidth;
        this.worldSize = this.scene.world.width;
        // Escala e offset do objeto baseado no tamanho do mundo
        this.scale = this.scene.game.config.width / (this.tileSize*this.worldSize);
        this.offset = (this.tileSize/2) * this.scale;

        // Dicionário contendo informações sobre animação e comportamento do objeto em questão
        this.animations = {};
        this.behaviors = {};

        // Váriaveis necessárias para a execução de código por parte do objeto e não pelo Blockly
        this.execList = [];
        this.execCooldown = 500; // Tempo em millisegundos entre cada função chamada
        this.currentExecution = null;
        this.nextExecution = null;
        this.inExecution = false;
        this.finishedExecution = false;
        this.pid = 0;

        // Preload tem que ser chamado manualmente
        this.preload();
    }
    preload() {
        // Adiciona o objeto à cena
        this.scene.add.existing(this);
        // Define a posição do objeto na cena
        this.x = ((this.x) * this.scale) + this.offset;
        this.y = ((this.y) * this.scale) + this.offset;
        // Guarda as informações de posição inicial para caso seja necessário
        this.initX = this.x;
        this.initY = this.y;
        // Escala o objeto para ficar posicionado corretamente
        this.setScale(this.scale);
    }

    // Reseta os valores do objeto para os iniciais
    setInitialValues() {
        this.x = this.initX;
        this.y = this.initY;
        this.inExecution = false;
        this.finishedExecution = false;
        this.currentExecution = null;
        this.nextExecution = null;
        this.execList = [];
    }
    // Verifica se o objeto está na posição worldX e worldY do mundo
    isAt(worldX, worldY) {
        if(worldX === this.x && worldY === this.y) {
            return true;
        }
        return false;
    }
    // Adiciona alguma função na lista de execução para ser executada em ordem posteriormente
    addForExecution(functionName, param=null) {
        this.execList.push({functionName : functionName, param: param});
    }
    // Função que executa as funções guardadas na lista de execução
    execute() {
        this.inExecution = true;
        this.finishedExecution = false;
        // Seleciona a primeira função a ser executada
        if(!this.currentExecution) {
            this.currentExecution = this.execList[0];
        }
        // Realiza teste para ver se existe alguma função pendente a ser chamada
        var next = function() {
            this.nextExecution = this.getNextExecution();
            this[this.currentExecution.functionName](this.currentExecution.param);
            if(this.nextExecution) {
                this.currentExecution = this.nextExecution;
                this.pid = setTimeout(next, this.execCooldown);
            } else {
                // Terminou de executar
                setTimeout(function() {
                    this.inExecution = false
                    this.finishedExecution = true;
                }.bind(this), this.execCooldown);
            }
        }.bind(this);
        setTimeout(next, this.execCooldown);

    }
    // Pega a próxima função na lista de execuções
    getNextExecution() {
        return this.execList[this.execList.indexOf(this.currentExecution) + 1] || false;
    }
    // Transforma a posição do objeto em posição na grid do mundo
    getTilePosition() {
        let layer = this.scene.world.getLayer('Ground');
        let position = -1;
        layer.tilemapLayer.forEachTile(function(tile) {
            let tileX = ((tile.pixelX * this.scale) + this.offset);
            let tileY = ((tile.pixelY * this.scale) + this.offset);

            if(this.isAt(tileX, tileY)) {
                position = {x: tile.x, y: tile.y};
            }
        }.bind(this));
        return position;
    }

}

export { GameObject };
