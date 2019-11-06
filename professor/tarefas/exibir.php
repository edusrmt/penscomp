<?php
if( $_SERVER["REQUEST_METHOD"] == "POST" ){
    session_start();

    if( ( isset($_SESSION["TASK_TYPE"]) && !is_null($_SESSION["TASK_TYPE"]) ) &&
        ( isset($_SESSION["TASK_KEY"]) && !is_null($_SESSION["TASK_KEY"]) ) )
    {
        if($_SESSION["TASK_TYPE"] == 'input'){
            $page_content = __DIR__.'/input/exibir.php';
        }else if($_SESSION["TASK_TYPE"] == 'choice'){
            $page_content = __DIR__.'/choice/exibir.php';
        }
        include(__DIR__.'/master.php');
    } else {
        header("Location: ./index.php");
    }


} else {
    header("Location: ./index.php");
}

