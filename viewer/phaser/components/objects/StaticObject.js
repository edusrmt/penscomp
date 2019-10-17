import { GameObject } from 'GameObject';

// Objeto sem funções de movimentação
class StaticObject extends GameObject {
    constructor(scene, id, pixelX, pixelY) {
        super(scene, id, pixelX, pixelY);

    }
}

export { StaticObject };
