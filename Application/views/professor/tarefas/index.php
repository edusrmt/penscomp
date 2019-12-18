<?php

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    session_start();

    // Caso tenha alguma chave de uma tarefa salva na sessão, remove
    if( isset($_SESSION['TASK_KEY'])) unset($_SESSION['TASK_KEY']);

    if( isset($_GET['sbTarefas']) && !is_null($_GET['sbTarefas']) ){

        //Verifica se foi passada alguma informação para ser filtrada
        if( isset($_GET['iptBusca']) && !is_null($_GET['iptBusca']) ){
            $_SESSION['SEARCH_FIELD'] = $_GET['iptBusca'];
        } else { $_SESSION['SEARCH_FIELD'] = null;}

        switch( $_GET['sbTarefas'] ){
            case 'input':
                $_SESSION['TASK_TYPE'] = 'input';
                $page_content = __DIR__."/input/listar.php";
                break;
            case 'choice':
                $_SESSION['TASK_TYPE'] = 'choice';
                $page_content = __DIR__."/choice/listar.php";
                break;
        }

    }
    else if( isset($_SESSION['TASK_TYPE']) && !is_null($_SESSION['TASK_TYPE']) ){
        switch( $_SESSION['TASK_TYPE'] ){
            case 'input':
                $page_content = __DIR__."/input/listar.php";
                break;
            case 'choice':
                $page_content = __DIR__."/choice/listar.php";
                break;
        }
    }
    else{
        $_SESSION['TASK_TYPE'] = 'input';
        $page_content = __DIR__."/input/listar.php";
    }
} else{
    $_SESSION['TASK_TYPE'] = 'input';
    $page_content = __DIR__."/input/listar.php";
}

//include_once __DIR__."/../master.php";