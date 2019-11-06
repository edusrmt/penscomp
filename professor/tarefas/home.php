<?php
require_once(__DIR__. "/../../php/webforms/utils.php");
require_once(__DIR__ . "/../../Models/Tasks.php");

$pairsTarefas = array( "input"=>"Entrada", "choice"=>"Múltipla Escolha" );

$tasks = new Tasks();

print "<form name=\"fmSelecionarTarefa\" method=\"post\" action=\"page.php\">";
wfSelectBox("sbTarefas", $pairsTarefas , "input");
wfSubmitButton("btnCriarTarefa", "Criar");
wfSubmitButton("btnFiltrarTarefa", "Filtrar");
print "</form>";

print "<form name=\"fmListaTarefas\" method=\"post\" action =\"./editar.php\">";
$inputs = $tasks->getTasks('input');
print($inputs[0]->getKey());
print "</form>";
