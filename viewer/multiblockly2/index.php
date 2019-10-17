<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <title>PENSCOMP</title>
    <!-- Questão enunciado normal - resposta blockly multi -->
    
	<!-- Carregando bibliotecas do Blockly -->
	<script type="text/javascript" 	src="./js/blockly_compressed.js"></script>
	<script type="text/javascript" 	src="./js/blocks_compressed.js"></script>
  	<script type="text/javascript"	src="./js/javascript_compressed.js"></script>
  	<script type="text/javascript"	src="./js/msg/en.js"></script>
  	
  	<!-- Carregando blocos --> 
  	<script type="text/javascript"	src="./js/gameBlocks.js"></script>

    <link rel="stylesheet" href="../common/css/style.css">
    <link rel="stylesheet" href="../common/css/task-viewer.css">
    <link rel="stylesheet" href="../common/css/choice.css">
</head>

<body>
    <header>
        <a class="navigation" href="../../php/tasks.php">< VOLTAR</a>
        <h1 class="logo">
            <a href="../../php/panel.php">Pens<span>comp</span></a>            
        </h1>
        <a class="navigation" href="./">PULAR QUESTÃO ></a>
    </header>

    <div class="task-container">
        <div class="task-text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eget ligula eu lectus lobortis condimentum. Aliquam nonummy auctor massa. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla at risus. Quisque purus magna, auctor et, sagittis ac, posuere eu, lectus. Nam mattis, felis ut adipiscing.
        </div>
        <div class="answer-area">
            <!-- Divs com alternativas -->
            <div class="options-wrapper">
                <button class="phaser-option" onclick="selecionar(1);">
                    <input type="radio" name="alternativa" id="r1" value="1">
                    <div id="blocklyDivOp1" class="phaser-injection"></div>
                </button>
                <button class="phaser-option" onclick="selecionar(2);">
                    <input type="radio" name="alternativa" id="r2" value="2">
                    <div id="blocklyDivOp2" class="phaser-injection"></div>
                </button>
                <button class="phaser-option" onclick="selecionar(3);">
                    <input type="radio" name="alternativa" id="r3" value="3">
                    <div id="blocklyDivOp3" class="phaser-injection"></div>
                </button>
                <button class="phaser-option" onclick="selecionar(4);">
                    <input type="radio" name="alternativa" id="r4" value="4">
                    <div id="blocklyDivOp4" class="phaser-injection"></div>
                </button>
            </div>
        </div> 
    </div>
    <!--<button id="enviar" onclick="enviarResposta();">Enviar questão</button>-->
	<!-- Carregando JavaScript da página -->
	<script type="text/javascript" 	src="./js/index.js"></script>
</body>
</html>