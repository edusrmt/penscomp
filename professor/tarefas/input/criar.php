<?php

require_once __DIR__."/../../../php/webforms/utils.php";
print "<h1><a>Criando Tarefas do Tipo Entrada</a></h1>";
print "<form id=\"formCriarInput\" >";
wfHyperLinkA("Titulo:");
wfInput("iptTitle", "text");
print "<br/>";
wfHyperLinkA("Corpo da Questão:");
wfInput("iptStatement", "text");
print "<br/>";
wfHyperLinkA("Resposta Correta:");
wfInput("iptRightAnswer", "text");
print "<br/>";
print "</form>";
wfButton("btnCriar", "button", "Confirmar", null,
    "submit-btn", false, "formCriarInput", "./input/addInput.php",
"post");

