import { DynamicObject } from 'DynamicObject';

// Objeto que pode ser controlado pelo usuário
class ControllableObject extends DynamicObject {

    constructor(scene, id, pixelX, pixelY, key, direction) {
        super(scene, id, pixelX, pixelY, key, direction);

    }

}

export { ControllableObject };
