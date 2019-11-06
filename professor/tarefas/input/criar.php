<?php

require_once __DIR__."/../../../php/webforms/utils.php";

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
wfButton("btnEditar", "button", "Confirmar", null,
    "submit-btn", false, "formCriarInput", "URL",
"post");
wfButton("btnDeletar", "button", "Cancelar", null, "submit-btn");
