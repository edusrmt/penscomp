<?php 
    session_start();
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
        <a href="./viewer.php" class="navigation" href="#">< VOLTAR</a>
        <h1 class="logo">
            <a href="./panel.php">Pens<span>comp</span></a>            
        </h1>
        <a class="navigation" href="../back/exam.php?end=true">ENVIAR EXAME ></a>
    </header>   
    

    <div class="answers-list">
        <table>
            <tr>
                <th>Questão</th>
                <th>Estado</th>
            </tr>

            <?php
                for($i = 0; $i < $_SESSION["taskCount"]; $i++) {
                    echo '<tr><td>'.($i + 1).'</td><td>';

                    if ($_SESSION["answers"][$i] != null)
                        echo '<span class="done">Respondida</span>';
                    else
                        echo '<span class="undone">Pendente</span>';

                    echo '</td></tr>';
                }
            ?>

        </table>
    </div>  
    
</body>
</html>

