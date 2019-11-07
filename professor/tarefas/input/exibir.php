<?php
require_once __DIR__."/../../../php/webforms/utils.php";
session_start();
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if( isset( $_SESSION['TASK_KEY'] ) && !is_null( $_SESSION['TASK_KEY'] ) ){
        print "<h1>".$_GET['btnDetalhar']."</h1>";
        wfHyperLinkA("Chave:");
        wfInput("iptKey", "text", "4458345789437583457483 //TODO", null, true);
        print "<br/>";
        wfHyperLinkA("Titulo:");
        wfInput("iptTitle", "text", "Title Input //TODO", null, true);
        print "<br/>";
        wfHyperLinkA("Corpo da Questão:");
        wfInput("iptStatement", "text", "Esse aqui é o corpo da questão, qualquer duvidas não vou responder.Esse aqui é o corpo da questão, qualquer duvidas não vou responder. Esse aqui é o corpo da questão, qualquer duvidas não vou responder. Esse aqui é o corpo da questão, qualquer duvidas não vou responder. Esse aqui é o corpo da questão, qualquer duvidas não vou responder. Esse aqui é o corpo da questão, qualquer duvidas não vou responder.  //TODO", null, true);
        print "<br/>";
        wfHyperLinkA("Resposta Correta:");
        wfInput("iptRightAnswer", "text", "Resposta correta. //TODO", null, true);
        print "<br/>";
        wfButton("btnEditar", "button", "Editar", "1010", "submit-btn");
        wfButton("btnDeletar", "button", "Deletar", "1010", "submit-btn");
    } else header("Location: ./listar.php");
} else header("Location: ./../index.php");
