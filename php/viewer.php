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
        <a class="navigation" href="../back/exam.php">ENVIAR RESPOSTA ></a>
    </header>
    
    <div class="task-container">
        <div class="task-text">
            <?php echo $task["statement"]; ?>
        </div>
        <div class="answer-area">
            <?php
                switch ($task["type"]) {
                    case "input":

                    echo '<input type="text" placeholder="Digite sua resposta aqui..."/>';
                    break;

                    case "choice":
                    echo '<div class="options-wrapper">';

                    $index = 0;
                    foreach ($task["options"] as $opt) {
                        echo '<button class="opt-button" onclick="selecionar('.$index.')">'.$opt["text"].'</button>';
                        $index++;
                    }
                        
                    echo '</div>';
                    break;
                }
            ?>
        </div> 
    </div>    
</body>
</html>