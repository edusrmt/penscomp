<?php

require_once(__DIR__."/../../../webform/utils.php");

$pairsTarefas = array( "input"=>"Entrada", "choice"=>"Múltipla Escolha" );


//== MENU

if( isset($_SESSION['WARNING']) && !is_null($_SESSION['WARNING'])){
    $errors = $_SESSION['WARNING'];
    print 'Corrija estes erros : <ul><li>';
    print implode('</li><li>', $errors);
    print '</li></ul>';
    unset($_SESSION['WARNING']);
}

print "<form name=\"fmSelecionarTarefa\" method=\"get\"  id=\"form1\">";
print "<table> <tr><td>";
wfSelectBox("sbTarefas", $pairsTarefas , "input", 'choice');
print "</td><td>";
wfButton("btnMudar", "submit", "Mudar",null, null, false, "form1", "./criar.php");
print "</td></td></tr> </table>";
print "</form>";

print "<h1><a>Criando Tarefas do Tipo Múltipla Escolha</a></h1>";
print "<form id=\"formCriarInput\" >";
wfHyperLinkA("Titulo:");

if(isset($_GET['sbTarefas']) && !is_null($_GET['sbTarefas'])){
    wfInput("iptTitle", "text");
    print "<br/>";
    wfHyperLinkA("Corpo da Questão:");
    wfInput("iptStatement", "text");
    print "<br/>";
    wfHyperLinkA("Opção 1:");
    wfInput("iptOp1", "text");
    print "<br/>";
    wfHyperLinkA("Opção 2:");
    wfInput("iptOp2", "text");
    print "<br/>";
    wfHyperLinkA("Opção 3:");
    wfInput("iptOp3", "text");
    print "<br/>";
    wfHyperLinkA("Opção 4:");
    wfInput("iptOp4", "text");
    print "<br/>";
    wfHyperLinkA("Opção 5:");
    wfInput("iptOp5", "text");
    print "<br/>";
    wfHyperLinkA("Opção 6:");
    wfInput("iptOp6", "text");
    print "<br/>";
    wfHyperLinkA("Opção 7:");
    wfInput("iptOp7", "text");
    print "<br/>";
    wfHyperLinkA("Resposta Correta:(Número da Opção)");
    wfInput("iptRightAnswer", "text");
}
else{
    wfInput("iptTitle", "text",$_SESSION['title'] ?? null);
    print "<br/>";
    wfHyperLinkA("Corpo da Questão:");
    wfInput("iptStatement", "text", $_SESSION['statement'] ?? null);
    print "<br/>";
    wfHyperLinkA("Opção 1:");
    wfInput("iptOp1", "text", $_SESSION['op1'] ?? null);
    print "<br/>";
    wfHyperLinkA("Opção 2:");
    wfInput("iptOp2", "text", $_SESSION['op2'] ?? null);
    print "<br/>";
    wfHyperLinkA("Opção 3:");
    wfInput("iptOp3", "text", $_SESSION['op3'] ?? null);
    print "<br/>";
    wfHyperLinkA("Opção 4:");
    wfInput("iptOp4", "text", $_SESSION['op4'] ?? null);
    print "<br/>";
    wfHyperLinkA("Opção 5:");
    wfInput("iptOp5", "text", $_SESSION['op5'] ?? null);
    print "<br/>";
    wfHyperLinkA("Opção 6:");
    wfInput("iptOp6", "text", $_SESSION['op6'] ?? null);
    print "<br/>";
    wfHyperLinkA("Opção 7:");
    wfInput("iptOp7", "text", $_SESSION['op7'] ?? null);
    print "<br/>";
    wfHyperLinkA("Resposta Correta:(Número da Opção)");
    wfInput("iptRightAnswer", "text", $_SESSION['rightAnswer'] ?? null);
    if(array_key_exists('title', $_SESSION) )unset($_SESSION['title']);
    if(array_key_exists('statement', $_SESSION)) unset($_SESSION['statement']);
    if(array_key_exists('rightAnswer', $_SESSION)) unset($_SESSION['rightAnswer']);
    if(array_key_exists('op1', $_SESSION)) unset($_SESSION['op1']);
    if(array_key_exists('op2', $_SESSION)) unset($_SESSION['op2']);
    if(array_key_exists('op3', $_SESSION)) unset($_SESSION['op3']);
    if(array_key_exists('op4', $_SESSION)) unset($_SESSION['op4']);
    if(array_key_exists('op5', $_SESSION)) unset($_SESSION['op5']);
    if(array_key_exists('op6', $_SESSION)) unset($_SESSION['op6']);
    if(array_key_exists('op7', $_SESSION)) unset($_SESSION['op7']);
}

print "<br/>";
print "</form>";
wfButton("btnCriar", "submit", "Confirmar", null,
    "submit-btn", false, "formCriarInput", "./choice/addChoice.php",
    "post");