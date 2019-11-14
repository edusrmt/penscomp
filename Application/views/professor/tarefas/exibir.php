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
            header("Location: ./index.php");
        }
    }
    else {
            header("Location: ./index.php");
        }
    } else header("Location: ./index.php");

