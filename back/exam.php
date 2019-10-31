<?php
    session_start();
    $tasksContent = file_get_contents("../json/tasks.json");
    $tasks = json_decode($tasksContent, true);
    $end_path = false;

    echo '<script>alert("'.$_GET["answer"].'");</script>';

    if (isset($_GET["goto"])) {
        switch ($_GET["goto"]) {
            case "prev":
            $taskIndex = $_SESSION["taskIndex"];
            $taskIndex -= 1;

            if ($taskIndex < 0)
                $taskIndex = count($tasks) - 1; 

            $_SESSION["taskIndex"] = $taskIndex;
            break;

            case "next":
            $taskIndex = $_SESSION["taskIndex"];
            $taskIndex += 1;

            if ($taskIndex >= count($tasks))
                $taskIndex = 0; 

            $_SESSION["taskIndex"] = $taskIndex;
            break;

            default:
            $_SESSION["taskIndex"] = $_GET["goto"] - 1;            
            break;
        }        
    } else if (isset($_GET["answer"])) {
        $_SESSION["answers"][$_SESSION["taskIndex"]] = $_GET["answer"];
    } else if (isset($_GET["end"])) {
        session_destroy();
        $end_path = true;
    } else {
        if (!isset($_SESSION["taskIndex"])) {
            $_SESSION["taskIndex"] = 0;
        }
    
        if (!isset($_SESSION["task"]) || empty($_SESSION["task"])) {
            $_SESSION["task"] = null;
        }

        if(!isset($_SESSION["answers"])) {
            $answers = array_fill(0, count($tasks), null);
            $_SESSION["answers"] = $answers;
        }
    
        $taskIndex = $_SESSION["taskIndex"];
        $_SESSION["task"] = $tasks[$taskIndex]; 
    }
    
    $_SESSION["taskCount"] = count($tasks);

    $_SESSION["task"] = $tasks[$_SESSION["taskIndex"]];
    
    if(!$end_path)
        header('Location: ../php/viewer.php');    
    else
        header('Location: ../php/tasks.php'); 
?>