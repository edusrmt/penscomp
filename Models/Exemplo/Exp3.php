<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PENSCOMP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="./../../css/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="./../../css/viewer.css" />
</head>
<body>
<header>
    <a href="./../php/tasks.php" class="navigation" href="#">< ATIVIDADES</a>
    <h1 class="logo">
        <a href="./../php/panel.php">Pens<span>comp</span></a>
    </h1>
    <a class="navigation">ENVIAR RESPOSTA ></a>
</header>

<?php
    require_once __DIR__ . '/../Tasks.php';
    //require_once __DIR__ . '../Input.php';

    $task = new Tasks();

    $input = $task->getInputEqualTo('Bolas'); //< Variavel do tipo Input
    echo '<div class="task-container"><div class="task-text">';
    echo $input->getStatement();
    echo '</div><div class="answer-area">';
    echo '<input type="text" placeholder="Digite sua resposta aqui..."/>';
    echo '</div></div>';
?>

</div>
</body>
</html>