<?php

require_once(__DIR__."/../../../webform/utils.php");
require_once(__DIR__.'/../../../../models/Tasks.php');
use Application\models\Tasks;
Use Application\models\Input;

if( isset( $_SESSION['TASK_KEY'] ) && !is_null( $_SESSION['TASK_KEY'] ) ){

    if( isset($_SESSION['WARNING']) && !is_null($_SESSION['WARNING'])){
        $errors = $_SESSION['WARNING'];
        print 'Corrija estes erros : <ul><li>';
        print implode('</li><li>', $errors);
        print '</li></ul>';
        unset($_SESSION['WARNING']);
    }
    if( !is_null($input->getKey()) ){
        wfHyperLinkA("Chave:");
        wfInput("iptKey", "text", $input->getKey(), null, true);
        print "<br/>";
        wfHyperLinkA("Titulo:");
        wfInput("iptTitle", "text", $input->getTitle(), null, true);
        print "<br/>";
        wfHyperLinkA("Corpo da Questão:");
        wfInput("iptStatement", "text", $input->getStatement(), null, true);
        print "<br/>";
        wfHyperLinkA("Resposta Correta:");
        wfInput("iptRightAnswer", "text", $input->getRightAnswer(), null, true);
        print "<br/>";
        print "<form id='formTabela'>";
        wfButton("btnConfirmar", "submit", "Confirmar", null, "submit-btn", false, null, './input/editInput.php', 'get');
        wfButton("btnCancelar", "submit", "Cancelar", null, "submit-btn", false, null, './exibir.php', 'get');
        print "</form>";
    }
    else header("Location: ./index.php");

} else header("Location: ./index.php");
