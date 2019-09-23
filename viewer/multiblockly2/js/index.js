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


//Reiniciando todos os radios para unchecked
window.onload = function(){
  let alt = document.getElementsByName('alternativa');
  for(let i = 0; i < alt.length; i++ ){
    alt[i].checked = false;
  }
}

// Envia a alternativa selecionada (remover?)
function enviarResposta(){
  let alt = document.getElementsByName('alternativa');
  let i, cont;
  cont = 0;
  for( i = 0; i < alt.length; i++ ){
    if( alt[i].checked ){
      if(alt[i].value === "1"){showCode(workSpaceOp1, i+1);cont=1;break;}
      if(alt[i].value === "2"){showCode(workSpaceOp2, i+1);cont=1;break;}
      if(alt[i].value === "3"){showCode(workSpaceOp3, i+1);cont=1;break;}
      if(alt[i].value === "4"){showCode(workSpaceOp4, i+1);cont=1;break;}
    }
  }
  if(cont == 0) alert("Nenhuma opção selecionada!");
}

// Altera estado da alternativa para selecionado e indica visualmente (fica igual ao estado de hover)
 function selecionar(x){
  let alt = document.getElementsByName('alternativa');
  let but = document.getElementsByClassName('phaser-option');
  console.log(alt);
  for( i = 0; i < but.length; i++ ){
    if(i+1 == x){
      if(but[i].className.slice(-12) != " selecionada"){
        but[i].className += " selecionada";
        alt[i].checked = true;
      }
    }
    else{
     if(but[i].className.slice(-12) == " selecionada"){
        but[i].className = but[i].className.slice(0, but[i].className.length-12);
        alt[i].checked = false;
      } 
    }
  }
 }