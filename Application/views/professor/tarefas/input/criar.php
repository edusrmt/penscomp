<?php

require_once(__DIR__."/../../../webform/utils.php");

$pairsTarefas = array( "input"=>"Entrada", "choice"=>"Múltipla Escolha" );


//== MENU

if( isset($_SESSION['WARNING']) && !is_null($_SESSION['WARNING'])){
    $errors = $_SESSION['WARNING'];
    print 'Avisos : <ul><li>';
    print implode('</li><li>', $errors);
    print '</li></ul>';
   unset($_SESSION['WARNING']);
}

print "<form name=\"fmSelecionarTarefa\" method=\"get\"  id=\"form1\">";
print "<table> <tr><td>";
wfSelectBox("sbTarefas", $pairsTarefas , "input", 'input');
print "</td><td>";
wfButton("btnMudar", "submit", "Mudar",null, null, false, "form1", "./criar.php");
print "</td></td></tr> </table>";
print "</form>";

print "<h1><a>Criando Tarefas do Tipo Entrada</a></h1>";
print "<form id=\"formCriarInput\" >";
wfHyperLinkA("Titulo:");

if(isset($_GET['sbTarefas']) && !is_null($_GET['sbTarefas'])){
    wfInput("iptTitle", "text");
    print "<br/>";
    wfHyperLinkA("Corpo da Questão:");
    wfInput("iptStatement", "text");
    print "<br/>";
    wfHyperLinkA("Resposta Correta:");
    wfInput("iptRightAnswer", "text");
}
else{
    wfInput("iptTitle", "text",$_SESSION['title'] ?? null);
    print "<br/>";
    wfHyperLinkA("Corpo da Questão:");
    wfInput("iptStatement", "text", $_SESSION['statement'] ?? null);
    print "<br/>";
    wfHyperLinkA("Resposta Correta:");
    wfInput("iptRightAnswer", "text", $_SESSION['rightAnswer'] ?? null);
    if(array_key_exists('title', $_SESSION) )unset($_SESSION['title']);
    if(array_key_exists('statement', $_SESSION)) unset($_SESSION['statement']);
    if(array_key_exists('rightAnswer', $_SESSION)) unset($_SESSION['rightAnswer']);
}
print "<br/>";
print "</form>";
wfButton("btnCriar", "submit", "Confirmar", null,
    "submit-btn", false, "formCriarInput", "./input/addInput.php",
    "post");