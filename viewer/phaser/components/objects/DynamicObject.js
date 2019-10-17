import { GameObject } from 'GameObject';

// Objeto capaz de se movimentar
class DynamicObject extends GameObject {
    constructor(scene, id, pixelX, pixelY, key, direction) {
        super(scene, id, pixelX, pixelY, key);

        // Direções permitidas que o objeto tem para andar
        this.allowedMoveDirections = [
            "UP", "RIGHT", "DOWN", "LEFT"
        ];
        // Todas as direções disponiveis
        this.moveDirections = {
            UP: "UP",
            RIGHT: "RIGHT",
            DOWN: "DOWN",
            LEFT: "LEFT"
        }
        this.initialDirection = direction; // Direção inicial do sprite
        this.currentMoveDirection = this.moveDirections[direction]; // Direção atual
        this.updateDirection(); // Atualizar sprite para a direção atual
    }

    // Move o objeto 1 tile na direção que está atualmente direcionado
    movement() {
        // Executa a animação de movimento se existir
        if(this.behaviors.movement)
            this.anims.play(this.animations[this.behaviors.movement]);

        switch(this.currentMoveDirection) {
            case this.moveDirections.UP:
                this.y -= this.offset*2;
                break;
            case this.moveDirections.RIGHT:
                this.x += this.offset*2;
                break;
            case this.moveDirections.DOWN:
                this.y += this.offset*2;
                break;
            case this.moveDirections.LEFT:
                this.x -= this.offset*2;
                break;
        }
    }

    // Muda a direção do objeto no sentido horário ou anti-horário
    turn(clockwise=true) {
        this.nextDirection(clockwise);
        this.updateDirection();
    }

    // Por enquanto atualiza a direção modificando o ângulo do objeto, deve depois atualizar pela spritesheet
    updateDirection() {
        switch(this.currentMoveDirection) {
            case this.moveDirections.UP:
                this.angle = 0;
                break;
            case this.moveDirections.RIGHT:
                this.angle = 90;
                break;
            case this.moveDirections.DOWN:
                this.angle = 180;
                break;
            case this.moveDirections.LEFT:
                this.angle = 270;
                break;
        }
    }

    // Retorna o objeto aos seus valores iniciais
    setInitialValues() {
        this.anims.stop();
        this.x = this.initX;
        this.y = this.initY;
        this.currentMoveDirection = this.moveDirections[this.initialDirection];
        this.inExecution = false;
        this.finishedExecution = false;
        this.currentExecution = null;
        this.nextExecution = null;
        this.execList = [];
        this.updateDirection();
    }

    // Verifica qual a próxima direção que o objeto deve girar, sentido horário ou anti-horário
    nextDirection(clockwise=true) {
        let currentIndex = this.allowedMoveDirections.indexOf(this.currentMoveDirection);
        let ckwise = clockwise ? 1 : -1;
        let newIndex = (currentIndex === (this.allowedMoveDirections.length-1) && clockwise) ? 0 : (currentIndex === 0 && !clockwise) ? (this.allowedMoveDirections.length-1) : (currentIndex + ckwise);
        let newDirection = this.allowedMoveDirections[newIndex];
        this.currentMoveDirection = this.moveDirections[newDirection];
        return this.currentMoveDirection;
    }
    // Passa qualquer direção para o objeto girar
    // TODO Só deve permitir direções que estão em allowedMoveDirections
    changeDirection(direction) {
        this.currentMoveDirection = direction;
        return this.currentMoveDirection;
    }

    // PROVISÓRIO, supostamente deve verificar qual o bloco que está a frente do objeto
    willBeAt(worldX, worldY) {
        switch(this.currentMoveDirection) {
            case this.moveDirections.UP:
                if(worldX === this.x && worldY === (this.y - this.offset*2)) return true;
                else return false;
                break;
            case this.moveDirections.RIGHT:
                if(worldX === (this.x + this.offset*2) && worldY === this.y) return true;
                else return false;
                break;
            case this.moveDirections.DOWN:
                if(worldX === this.x && worldY === (this.y + this.offset*2)) return true;
                else return false;
                break;
            case this.moveDirections.LEFT:
                if(worldX === (this.x - this.offset*2) && worldY === this.y) return true;
                else return false;
                break;
        }
    }

}

export { DynamicObject };
