<?php
    session_start();
    $task = $_SESSION["task"];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PENSCOMP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../css/viewer.css" />
    <script src="../js/viewer.js"></script>
</head>
<body>
    <header>
        <a href="./tasks.php" class="navigation" href="#">< ATIVIDADES</a>
        <h1 class="logo">
            <a href="./panel.php">Pens<span>comp</span></a>            
        </h1>
        <a class="navigation" href="./end.php">FINALIZAR EXAME ></a>
    </header>
    
    <div class="progress-container">
        <ul id="task-list">
            <a href="../back/exam.php?goto=prev"><li class="arrow"><</li></a>
            <?php
                for ($i = 1; $i <= $_SESSION["taskCount"]; $i++) {
                    if ($i != $_SESSION["taskIndex"] + 1) {
                        if($_SESSION["answers"][$i - 1] != null)
                            echo '<a href="../back/exam.php?goto='.$i.'"><li class="has-answer">'.$i.'</li></a>';
                        else
                            echo '<a href="../back/exam.php?goto='.$i.'"><li>'.$i.'</li></a>';
                    } else {
                        if($_SESSION["answers"][$i - 1] != null)
                            echo '<a href="../back/exam.php?goto='.$i.'"><li class="current-task has-answer">'.$i.'</li></a>';
                        else
                            echo '<a href="../back/exam.php?goto='.$i.'"><li class="current-task">'.$i.'</li></a>';
                    }                    
                }
            ?>
            <a href="../back/exam.php?goto=next"><li class="arrow">></li></a>
        </ul>
    </div>

    <div class="task-container">
        <div class="task-text">
            <?php echo $task["statement"]; ?>
        </div>
        <div class="answer-area">
            <form id="task-answer" action="../back/exam.php" method="GET">
            <?php
                switch ($task["type"]) {
                    case "input":
                        if($_SESSION["answers"][$_SESSION["taskIndex"]] != null)
                            echo '<input id="answer-input" type="text" name="answer" placeholder="Digite sua resposta aqui..." value="'.$_SESSION["answers"][$_SESSION["taskIndex"]].'" />';
                        else
                            echo '<input id="answer-input" type="text" name="answer" placeholder="Digite sua resposta aqui..."/>';
                    break;

                    case "choice":
                    echo '<div class="options-wrapper">';
                    echo '<input id="answer-input" type="text" name="answer" hidden>';

                    $saved_answer = [];
                        
                    if($_SESSION["answers"][$_SESSION["taskIndex"]] != null)
                        $saved_answer = explode (",", $_SESSION["answers"][$_SESSION["taskIndex"]]);

                    $index = 0;
                    foreach ($task["options"] as $opt) {
                        echo '<button type="button" class="opt-button" onclick="selecionar('.$index.')">'.$opt["text"].'</button>';
                        
                        if (in_array($index, $saved_answer))
                            echo '<script>selecionar('.$index.');</script>';
                            
                        $index++;
                    }
                        
                    echo '</div>';
                    break;
                }
            ?>
            </form>
        </div> 

        <button class="submit-btn" onclick="salvar()">Salvar</button>  
    </div>  
    
</body>
</html>

