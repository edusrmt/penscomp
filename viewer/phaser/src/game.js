// Importação do Workspace do Blockly
import { Workspace } from 'Workspace';
// Importação de classes objetos do Phaser
import { World } from 'World';
import { ControllableObject } from 'ControllableObject';
import { DynamicObject } from 'DynamicObject';
import { StaticObject } from 'StaticObject';
// Importação de utilitários
import { parseMap } from 'ParseMap';

// Classe principal que vai dar conta de montar o jogo
class Game extends Phaser.Scene {

    constructor() {
        super({key: 'Game'});
        this.objects = [];
    }

    preload() {
        this.isPlaying = false;

        // Pega as informações do jogo no cache
        this.GameData = this.game.cache.json.get('gameData');
        // Define o tipo de jogo (TopDown, Platformer, Isometric)
        this.type = this.GameData.type;
        // Carrega os sprites de cada objeto do jogo
        this.GameData.objects.forEach((obj) => {
            if(!obj.hasOwnProperty('graphics')) {
                return;
            }
            // Spritesheet pra objetos que possuem animação
            if(obj.graphics.hasOwnProperty('animation')){
                this.load.spritesheet(obj.graphics.sprite.name, obj.graphics.sprite.src, {frameWidth: obj.graphics.sprite.width, frameHeight:obj.graphics.sprite.height});
            }
            // Imagem estática para objetos que não possuem animação
            else {
                this.load.image(obj.graphics.sprite.name, obj.graphics.sprite.src);
            }
        });

        // PROV - Aplicação no momento só suporta carregar um tileset de mundo por jogo
        this.load.image('tiles', this.GameData.world.tileset);
    }

    create() {
        // Organiza as informações do mapa e cria o mundo
        let layerNames = Array.from(this.GameData.world.layers, (val) => val.name);
        let parsedMap = parseMap(this.GameData.world);
        this.world = new World(this, parsedMap, layerNames);

        // Cria e injeta o workspace do blockly
        this.workspace = new Workspace();
        this.workspace.inject();

        // Cria, configura e posiciona os objetos nos locais destinados do mundo
        this.GameData.objects.forEach((obj) => {
            // Define a posição em pixels do objeto baseado na posição do mundo (x, y)
            let objPosition = this.world.getTileAt(obj.position.x, obj.position.y, true, "Ground");

            // Se o objeto possui sprite
            let hasGraphics = obj.hasOwnProperty('graphics');

            // Cria o objeto com sua respectiva classe
            let object;
            if(obj.type === "controllable") {
                object = new ControllableObject(this, obj.id, objPosition.pixelX, objPosition.pixelY, obj.graphics.sprite.name, obj.graphics.sprite.direction);
            } else if(obj.type === "static"){
                object = new StaticObject(this, obj.id, objPosition.pixelX, objPosition.pixelY);
            }

            // Se o objeto tiver animação, fazer o registro das animações no jogo
            if(hasGraphics && obj.graphics.hasOwnProperty('animation')) {
                obj.graphics.animation.forEach((anim) => {
                    this.anims.create({
                        key: anim.name,
                        frames: this.anims.generateFrameNumbers(obj.graphics.sprite.name, { start: anim.firstKey, end: anim.lastKey }),
                        frameRate: anim.frameRate,
                        repeat: anim.repeat ? -1 : 0
                    });
                    object.animations[anim.animKey] = anim.name;
                })
            }

            // Configura as funções de acordo com os comportamentos do objeto
            if(obj.hasOwnProperty('behaviors')) {

                // PROV
                this.workspace.addToApi("addForExecution", object);

                obj.behaviors.forEach((behavior) => {
                    object.behaviors[behavior.type] = behavior.animKey;

                    // Configura cada comportamento pelo seu tipo
                    if(behavior.type === "movement") {
                        // Verifica se o comportamento de movimento possui direções definidas
                        if(behavior.hasOwnProperty('directions')) {
                            object.allowedMoveDirections = behavior.directions;
                        }
                    }
                });
            }

            // Adiciona os novos objetos na lista de objetos do jogo
            this.objects.push(object);
        });

        // Botão teste apenas para executar o código do blockly
        document.getElementById('teste').onclick = () => {
            this.reset();
            this.workspace.run();
            this.isPlaying = true;
            document.getElementById("teste").disabled = true;
        }
    }

    update() {
        // PROV
        if(this.isPlaying) {
            switch(this.GameData.victory.type) {
                case "reach_the_goal":
                    let obj = this.getObjectById(this.GameData.victory.object);
                    let goal = this.getObjectById(this.GameData.victory.goal);

                    // Se o objeto ainda não está em execução
                    if(!obj.inExecution && !obj.finishedExecution){
                        obj.execute();
                    }
                    // Se o objeto está em execução [ Para testes durante a execução ]
                    else if (obj.inExecution && !obj.finishedExecution){
                        document.getElementById("teste").disabled = false;

                        let objTilePosition = obj.getTilePosition();
                        let tileIndex = this.world.getTileAt(objTilePosition.x, objTilePosition.y, true, "Ground").index;
                        if(tileIndex === -1) {
                            this.workspace.stop();
                            this.reset();
                            console.log('Saiu da pista');
                            alert("Saiu da pista");
                        }

                    }
                    // Se o objeto terminou a execução [ Para testes pós execução ]
                    else if (!obj.inExecution && obj.finishedExecution) {
                        if(obj.isAt(goal.x, goal.y)) {
                            this.workspace.stop();
                            this.reset();
                            console.log('Ganhou');
                            alert("Ganhou");
                        } else {
                            this.workspace.stop();
                            this.reset();
                            console.log('Não chegou ao final');
                            alert("Não chegou ao final");
                        }
                    }
                default:
                    return;
            }
        }
    }

    // Retorna um objeto do jogo pelo seu id
    getObjectById(id) {
        let object = false;
        this.objects.forEach((obj) => {
            if(obj.id == id) {
                object = obj;
            }
        });
        return object;
    }

    // Reseta todos os objetos para seus valores iniciais
    reset() {
        this.isPlaying = false;
        this.objects.forEach((obj) => {
            obj.setInitialValues();
        });
    }

}

export { Game };
