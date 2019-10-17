// World deriva da classe Tilemap do Phaser
class World extends Phaser.Tilemaps.Tilemap {

    constructor(scene, mapdata, layerNames) {

        // Passa os parâmetros para o super (Phaser.Tilemaps.Tilemap)
        super(scene, mapdata);
        // Define atributos do objeto
        this.scene = scene;
        this.layerNames = layerNames;
        this._layers = [];

        // PROV
        this.provTileset = 'tiles';

        // Preload tem que ser chamado manualmente
        this.preload();
    }

    preload() {
        // Define o tileset do mapa utilizando os dados que vieram no parâmetro
        this.tileset = this.addTilesetImage(this.provTileset);
        // Para cada nome de camada existente, criar um objeto camada com o tileset dado
        this.layerNames.forEach((name) => {
            this._layers.push(this.createStaticLayer(name, this.provTileset));
        });
        // Escala as camadas baseado no tamanho do Phaser na tela e os dados do mapa
        this.scaleLayers(this.scene.game.config.width / (this.tileWidth * this.width));
    }

    // Função para modificar a escala das camadas
    // Por equanto é preferido a utilização de um mapa de mesma altura e largura. Ex: 5x5
    scaleLayers(scale) {
        this._layers.forEach((layer) => {
            layer.setScale(scale);
        });
    }

}

export { World };
