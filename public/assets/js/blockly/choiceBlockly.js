var workSpaceOp1 = Blockly.inject('blocklyDivOp0', { readOnly: true });
var workSpaceOp2 = Blockly.inject('blocklyDivOp1', { readOnly: true });
var workSpaceOp3 = Blockly.inject('blocklyDivOp2', { readOnly: true });
var workSpaceOp4 = Blockly.inject('blocklyDivOp3', { readOnly: true });

var bloco0 = document.getElementById("span0").innerHTML;
var bloco1 = document.getElementById("span1").innerHTML;
var bloco2 = document.getElementById("span2").innerHTML;
var bloco3 = document.getElementById("span3").innerHTML;

var urlOp = [];

urlOp.push("/assets/xml/"+bloco0+".xml");
urlOp.push("/assets/xml/"+bloco1+".xml");
urlOp.push("/assets/xml/"+bloco2+".xml");
urlOp.push("/assets/xml/"+bloco3+".xml");

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