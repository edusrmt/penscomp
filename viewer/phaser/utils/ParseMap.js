function parseMap(json) {

    let layers = [];

    json.layers.forEach((layer) => {

        let l = new Phaser.Tilemaps.LayerData();

        let tiles = [];
        let matrix = makeMatrix(layer.data, layer.width);

        for(let i = 0; i < layer.height; i++) {
            for(let j = 0; j < layer.width; j++) {
                tiles.push(new Phaser.Tilemaps.Tile(l, matrix[i][j], j, i, json.tileWidth, json.tileHeight, json.tileWidth, json.tileHeight));
            }
        }

        l.alpha = layer.opacity;
        l.data = makeMatrix(tiles, layer.width);
        l.height = layer.height;
        l.width = layer.width;
        l.tileWidth = json.tileWidth;
        l.tileHeight = json.tileHeight;
        l.name = layer.name;
        l.visible = layer.visible;
        l.x = layer.x;
        l.y = layer.y;

        layers.push(l);
    });

    let config = {
        'height': json.height,
        'width': json.width,
        'tileWidth': json.tileWidth,
        'tileHeight': json.tileHeight,
        'layers': layers
    }
    const mapdata = new Phaser.Tilemaps.MapData(config)

    return mapdata;

}

function makeMatrix(list, qt) {
    let matrix = [];
    let i, k = 0;

    for(i = 0, k = -1; i < list.length; i++) {
        if(i % qt === 0) {
            k++;
            matrix[k] = [];
        }
        matrix[k].push(list[i])
    }
    return matrix;
}

export { parseMap }
