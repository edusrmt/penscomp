<?php
session_start();
if( $_SERVER['REQUEST_METHOD'] == "GET"){

    if( (isset($_GET['sbTarefas']) && !is_null($_GET['sbTarefas'])) ||
        ( isset($_SESSION['TASK_TYPE']) && !is_null($_SESSION['TASK_TYPE']) )){
        $type;
        if(isset($_GET['sbTarefas']) )$type = $_GET['sbTarefas'];
        else $type = $_SESSION['TASK_TYPE'];
        switch ($type){
            case 'input':
                $page_content = __DIR__.'/input/criar.php';
                break;
            case 'choice':
                $page_content = __DIR__.'/choice/criar.php';
                break;
        }
    }
    else
        $page_content = __DIR__.'/input/criar.php';
}
else $page_content = __DIR__.'/input/criar.php';

include_once __DIR__."/master.php";