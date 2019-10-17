<?php
    session_start();
    $tasksContent = file_get_contents("../json/tasks.json");
    $tasks = json_decode($tasksContent, true);

    if($_SESSION["init"] == 0){
        $_SESSION["init"] = 1;
        $_SESSION["tasks"] = array();
        for($i = 0; $i < count($tasks);$i++){
            $_SESSION["tasks"][] = 0;
        }
        $_SESSION["taskIndex"] = -1;
    }
    else{
        $_SESSION["tasks"][$_SESSION["taskIndex"]] = 1;
    }

    if (!isset($_SESSION["taskIndex"])) {
        $_SESSION["taskIndex"] = -1;
        echo 'hey';
    }

    if (!isset($_SESSION["task"]) || empty($_SESSION["task"])) {
        $_SESSION["task"] = null;
    }

    $taskIndex = $_SESSION["taskIndex"];

    $taskIndex += 1;

    if ($taskIndex >= count($tasks))
        $taskIndex = 0;    


    $_SESSION["taskIndex"] = $taskIndex;
    $_SESSION["task"] = $tasks[$taskIndex];

    header('Location: ../php/viewer.php')
?>