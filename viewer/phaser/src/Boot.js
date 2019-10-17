// Classe para boot da aplicação, serve apenas para carregar o json do jogo e
// talvez mostrar alguma tela com a logo do projeto
class Boot extends Phaser.Scene {
    constructor() { super({ key: 'Boot' }); }

    preload() {
        // Carrega as informações do jogo
        this.load.json('gameData', 'game.json');

        // Após carregar as informações do jogo, começar a cena de jogo
        this.load.on('complete', () => {
            this.scene.start('Game');
        });
    }
}

export { Boot };
