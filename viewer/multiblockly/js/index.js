// Ler o arquivo json do jogo.
console.log("Beta Blockly Multi-Q.");
var xmlhttp = new XMLHttpRequest();
var jsonJogo; //< Armazena o json.
xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            jsonJogo = JSON.parse(this.responseText);
            gerarJogo(jsonJogo);
        }
    };
xmlhttp.open("GET", "./json/jogo.json", true);
xmlhttp.send();

// Ler os arquivos de alternativas de blocos
var workSpaceOp1 = Blockly.inject('blocklyDivOp1', { readOnly: true });
var workSpaceOp2 = Blockly.inject( 'blocklyDivOp2', { readOnly: true } );
var workSpaceOp3 = Blockly.inject('blocklyDivOp3', { readOnly: true });
var workSpaceOp4 = Blockly.inject('blocklyDivOp4', { readOnly: true });

var urlOp = [];

urlOp.push("./xml/bloco1.xml");
urlOp.push("./xml/bloco2.xml");
urlOp.push("./xml/bloco3.xml");
urlOp.push("./xml/bloco4.xml");

var xmlhttp1 = new XMLHttpRequest();
var xmlhttp2 = new XMLHttpRequest();
var xmlhttp3 = new XMLHttpRequest();
var xmlhttp4 = new XMLHttpRequest();

xmlhttp1.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var xmlDoc = (this.responseText);
      Blockly.Xml.domToWorkspace(Blockly.Xml.textToDom(xmlDoc), workSpaceOp1);
    }
};

xmlhttp1.open("GET", urlOp[0], true);
xmlhttp1.send();

xmlhttp2.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var xmlDoc = (this.responseText);
      Blockly.Xml.domToWorkspace(Blockly.Xml.textToDom(xmlDoc), workSpaceOp2);
    }
};

xmlhttp2.open("GET", urlOp[1], true);
xmlhttp2.send();

xmlhttp3.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var xmlDoc = (this.responseText);
      Blockly.Xml.domToWorkspace(Blockly.Xml.textToDom(xmlDoc), workSpaceOp3);
    }
};

xmlhttp3.open("GET", urlOp[2], true);
xmlhttp3.send();

xmlhttp4.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var xmlDoc = (this.responseText);
      Blockly.Xml.domToWorkspace(Blockly.Xml.textToDom(xmlDoc), workSpaceOp4);
    }
};

xmlhttp4.open("GET", urlOp[3], true);
xmlhttp4.send();

function gerarJogo( gjs )
{
  const GB = new GameBuilder();
  const GAME = GB.newGame({
    title: "Editor-Jogo",
    width: 500,
    height: 500,
    parent: "editor-phaser"
  }, gjs);
  GAME.buildWorld();
  GAME.spawnObjects();
}
// Carregar Phaser


function enviarResposta(){
  let alt = document.getElementsByName('alternativa');
  let i;
  for( i = 0; i < alt.lenght; i++ ){
    if( alt[i].checked ){
      if(alt[i].value === "I"){showCode(workSpaceOp1, i+1);break;}
      if(alt[i].value === "II"){showCode(workSpaceOp2, i+1);break;}
      if(alt[i].value === "III"){showCode(workSpaceOp3, i+1);break;}
      if(alt[i].value === "IV"){showCode(workSpaceOp4, i+1);break;}
    }
  }
  if( i >= ele.length ) alert("Nenhuma opção selecionada!");
}