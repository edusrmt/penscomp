<?php
session_start();
//Checa se chegou na página atraves de uma request
if( array_key_exists('REQUEST_METHOD', $_SERVER) )
{

    //Verifica se o tipo de request foi GET
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        //Armazena a opção escolhida na SelectBox Tarefas
        //caso tenha sido selecionada
        if(isset($_GET['sbTarefas'])) $_SESSION['TASK_TYPE'] = $_GET['sbTarefas'];
        else $_SESSION['TASK_TYPE'] = input;

        if( isset($_GET['iptSearch']) && !is_null($_GET['iptSearch']) ) $_SESSION['SEARCH_FIELD'] = $_GET['iptSearch'];
        else $_SESSION['SEARCH_FIELD'] = null;

        //Checa se o TASK_TYPE está com valores inseridos
        if( isset($_SESSION['TASK_TYPE']) && !is_null($_SESSION['TASK_TYPE'])) {

            //Checa o tipo de tarefa selecionada
            switch ($_SESSION['TASK_TYPE']) {
                case 'input':
                    $_SESSION['TASK_TYPE'] = 'input';
                    $page_content = __DIR__."/input/listar.php";
                    break;
                case 'choice':
                    $_SESSION['TASK_TYPE'] = 'choice';
                    $page_content = __DIR__."/choice/listar.php";
                    break;
                default:
                    $_SESSION['TASK_TYPE'] = 'input';
                    $page_content = __DIR__."/input/listar.php";
                    break;
            }
        }
    } else {
        $_SESSION['TASK_TYPE'] = 'input';
        $_SESSION['SEARCH_FIELD'] = null;
        $page_content = __DIR__."/input/listar.php";
    }
}
if(!isset($_SESSION['TASK_TYPE'])){
    print "Não foi request";
    $_SESSION['TASK_TYPE'] = 'input';
    $page_content = __DIR__."/input/listar.php";
}
include_once(__DIR__.'/master.php');



