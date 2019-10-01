<?php
    session_start();
    $tasksContent = file_get_contents("../json/tasks.json");
    $tasks = json_decode($tasksContent, true);

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