<?php
require_once(__DIR__."/../../../webform/utils.php");
require_once(__DIR__.'/../../../../models/Tasks.php');
use Application\models\Tasks;
Use Application\models\Choice;

if( isset( $_SESSION['TASK_KEY'] ) && !is_null( $_SESSION['TASK_KEY'] ) ){
    if( isset($_SESSION['WARNING']) && !is_null($_SESSION['WARNING'])){
        $errors = $_SESSION['WARNING'];
        print 'Avisos : <ul><li>';
        print implode('</li><li>', $errors);
        print '</li></ul>';
        unset($_SESSION['WARNING']);
    }
    $task = new Tasks();
    $choice = $task->getChoiceEqualTo($_SESSION['TASK_KEY']);
    if( !is_null($choice->getKey()) ){
        wfHyperLinkA("Chave:");
        wfInput("iptKey", "text", $choice->getKey(), null, true);
        print "<br/>";
        wfHyperLinkA("Titulo:");
        wfInput("iptTitle", "text", $choice->getTitle(), null, true);
        print "<br/>";
        wfHyperLinkA("Corpo da Questão:");
        wfInput("iptStatement", "text", $choice->getStatement(), null, true);
        print "<br/>";
        foreach( $choice->getOptions() as $id=>$op ){
            wfHyperLinkA("Opção ".($id + 1).":");
            wfInput("iptOp".($id + 1), "text", $op['text'], null, true);
            print "<br/>";
        }
        wfHyperLinkA("Resposta Correta:");
        wfInput("iptRightAnswer", "text", $choice->getRightAnswer(), null, true);
        print "<br/>";
        print "<form id='formTabela'>";
        wfButton("btnEditar", "submit", "Editar", null, "submit-btn", false, null, './editar.php', 'get');
        wfButton("btnDeletar", "submit", "Deletar", null, "submit-btn", false, null, './choice/rmvChoice.php', 'post');
        print "</form>";
    }
    else header("Location: ./index.php");

} else header("Location: ./index.php");