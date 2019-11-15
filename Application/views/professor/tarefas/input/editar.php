<?php

require_once(__DIR__."/../../../webform/utils.php");
require_once(__DIR__.'/../../../../models/Tasks.php');
use Application\models\Tasks;
Use Application\models\Input;

if( isset( $_SESSION['TASK_KEY'] ) && !is_null( $_SESSION['TASK_KEY'] ) ){

    if( isset($_SESSION['WARNING']) && !is_null($_SESSION['WARNING'])){
        $errors = $_SESSION['WARNING'];
        print 'Avisos : <ul><li>';
        print implode('</li><li>', $errors);
        print '</li></ul>';
        unset($_SESSION['WARNING']);
    }
    $task = new Tasks();
    $input = $task->getInputEqualTo($_SESSION['TASK_KEY']);
    if( !is_null($input->getKey()) ){
        print "<form id='formTabela'>";
        wfHyperLinkA("Chave:");
        wfInput("iptKey", "text", $input->getKey(), null, true);
        print "<br/>";
        wfHyperLinkA("Titulo:");
        wfInput("iptTitle", "text", $input->getTitle(), null, false);
        print "<br/>";
        wfHyperLinkA("Corpo da Questão:");
        wfInput("iptStatement", "text", $input->getStatement(), null, false);
        print "<br/>";
        wfHyperLinkA("Resposta Correta:");
        wfInput("iptRightAnswer", "text", $input->getRightAnswer(), null, false);
        print "<br/>";
        print "</form>";
        wfButton("btnConfirmar", "submit", "Confirmar", null, "submit-btn", false, 'formTabela', './input/editInput.php', 'post');
        wfButton("btnCancelar", "submit", "Cancelar", null, "submit-btn", false, null, './exibir.php', 'get');
    }
    else header("Location: ./index.php");

} else header("Location: ./indexcd.php");
