<?php
require_once(__DIR__. "/../../php/webforms/utils.php");
require_once(__DIR__ . "/../../Models/Tasks.php");

$pairsTarefas = array( "input"=>"Entrada", "choice"=>"Múltipla Escolha" );

$tasks = new Tasks();

print "<form name=\"fmSelecionarTarefa\" method=\"post\" action=\"page.php\">";
wfselectBox("sbTarefas", $pairsTarefas , "input");
wfsubmitButton("btnCriarTarefa", "Criar");
wfsubmitButton("btnFiltrarTarefa", "Filtrar");
print "</form>";

print "<form name=\"fmListaTarefas\" method=\"post\" action =\"./editar.php\">";

foreach ($tasks->getTasks("input") as $id=>$value) {
    print "<p> [$id] - [$value] </p> <br>";
}

print "</form>";
