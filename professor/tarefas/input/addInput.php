<?php
session_start();

require_once __DIR__.'/../../../Models/Tasks.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if( isset($_POST['iptTitle']) && isset($_POST['iptStatement']) && isset($_POST['iptRightAnswer'])){
        $input = new Input(
          null,
            $_POST['iptTitle'],
            $_POST['iptStatement'],
            $_POST['iptRightAnswer']
        );
        $task = new Tasks();
        $key = $task->setInput($input);
        $_SESSION['TASK_TYPE'] = 'input';
        $_SESSION['TASK_KEY'] = $key;
        header("Location: ./../exibir.php");
    }
}