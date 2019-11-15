<?php
if( $_SERVER['REQUEST_METHOD'] == 'GET' ){
    session_start();
    if( ( isset($_GET['btnDetalhar']) && !is_null($_GET['btnDetalhar']) ) ||
        ( isset($_SESSION['TASK_KEY']) && !is_null($_SESSION['TASK_KEY']) )){

        if( ( isset($_GET['btnDetalhar']) && !is_null($_GET['btnDetalhar']) )) $_SESSION['TASK_KEY'] = $_GET['btnDetalhar'];
        if( isset($_SESSION['TASK_TYPE']) && !is_null($_SESSION['TASK_TYPE']) ){
            switch($_SESSION['TASK_TYPE']){
                case 'input':
                    $page_content = __DIR__.'/input/exibir.php';
                    break;
                case 'choice':
                    $page_content = __DIR__.'/choice/exibir.php';
                    break;
            }
            include_once __DIR__.'/master.php';
        } else {
            $erros[] = "Tipo da Tarefa Não foi Escolhido.";
            $_SESSION['WARNING'] = $erros;
            header("Location: ./index.php");
        }
    }
    else {
        $erros[] = "Nenhuma tarefa para detalhar ou sem tipo escolhido.";
        $_SESSION['WARNING'] = $erros;
        header("Location: ./index.php");
        }
    }
else{
    $erros[] = "Algum erro aconteceu ao solicitar a página.";
    $_SESSION['WARNING'] = $erros;
    header("Location: ./index.php");
}

