<?php $task = $data['task']; ?>
<script type="text/javascript"  src="/assets/js/blockly/blockly_compressed.js"></script>
<script type="text/javascript"  src="/assets/js/blockly/blocks_compressed.js"></script>
<script type="text/javascript"  src="/assets/js/blockly/javascript_compressed.js"></script>
<script type="text/javascript"  src="/assets/js/blockly/msg/en.js"></script>
<script type="text/javascript"  src="/assets/js/blockly/gameBlocks.js"></script>
<script type="text/javascript"  src="/assets/js/blockly/gamebuilder.js"></script>   
<div class="viewer"> 
    <header>
        <a href="/task" class="navigation" href="#">< ATIVIDADES</a>
        <h1 class="logo">
            <a href="/panel">Pens<span>comp</span></a>            
        </h1>
        <a class="navigation" href="/exam/end">FINALIZAR EXAME ></a>
    </header>

    <div class="progress-container">
        <ul id="task-list">
            <a href="/exam/prev"><li class="arrow"><</li></a>
            <?php
                for ($i = 0; $i <= $_SESSION["examSize"] - 1; $i++) {
                    if ($i != $_SESSION["currentTask"]) {
                        if($_SESSION["answers"][$i] != null)
                            echo '<a href="/exam/open/'.$i.'"><li class="has-answer">'.($i + 1).'</li></a>';
                        else
                            echo '<a href="/exam/open/'.$i.'"><li>'.($i + 1).'</li></a>';
                    } else {
                        if($_SESSION["answers"][$i] != null)
                            echo '<a href="/exam/open/'.$i.'"><li class="current-task has-answer">'.($i + 1).'</li></a>';
                        else
                            echo '<a href="/exam/open/'.$i.'"><li class="current-task">'.($i + 1).'</li></a>';
                    }                    
                }
            ?>
            <a href="/exam/next"><li class="arrow">></li></a>
        </ul>
    </div>

    <script src="/assets/js/viewer.js"></script>

    <div class="task-container">
        <div class="task-text">
            <?php echo $task["statement"]; ?>
        </div>
        <?php 
            if($task["type"] == "choicePhaserBlockly"){
                echo '<div class="task-phaser">';
                echo '<span id="spanPhaser" style="display: none">'.$task["phaser"].'</span>';
                echo '<div id="editor-phaser"></div>'; 
                echo '</div>';
            }
        ?>
        <div class="answer-area">
            <form id="task-answer" action="/exam/answer" method="POST">
            <?php
                switch ($task["type"]) {
                    case "input":
                        if($_SESSION["answers"][$_SESSION["currentTask"]] != null)
                            echo '<input id="answer-input" type="text" name="answer" placeholder="Digite sua resposta aqui..." value="'.$_SESSION["answers"][$_SESSION["currentTask"]].'" />';
                        else
                            echo '<input id="answer-input" type="text" name="answer" placeholder="Digite sua resposta aqui..."/>';
                    break;

                    case "choice":
                    echo '<div class="options-wrapper">';
                    echo '<input id="answer-input" type="text" name="answer" hidden>';

                    $saved_answer = [];
                        
                    if($_SESSION["answers"][$_SESSION["currentTask"]] != null)
                        $saved_answer = explode (",", $_SESSION["answers"][$_SESSION["currentTask"]]);

                    $index = 0;
                    foreach ($task["options"] as $opt) {
                        echo '<button type="button" class="opt-button" onclick="selecionar('.$index.')">'.$opt["text"].'</button>';
                        
                        if (in_array($index, $saved_answer)) {
                            echo '<script>selecionar('.$index.');</script>';
                        }
                            
                        $index++;
                    }
                        
                    echo '</div>';
                    break;

                    case "choiceBlockly":
                    echo '<div class="options-wrapper">';

                    echo '<input id="answer-input" type="text" name="answer" hidden>';

                    $saved_answer = [];
                        
                    if($_SESSION["answers"][$_SESSION["currentTask"]] != null)
                        $saved_answer = explode (",", $_SESSION["answers"][$_SESSION["currentTask"]]);

                    $index = 0;
                    foreach ($task["options"] as $opt) {
                        echo '<button type="button" class="phaser-option opt-button" onclick="selecionar_blockly('.$index.')">';
                        echo '<span id="span'.$index.'" style="display: none">'.$opt["text"].'</span>';
                        echo '<div id="blocklyDivOp'.$index.'" class="phaser-injection"></div>';
                        echo '</button>';

                        if (in_array($index, $saved_answer)) {
                            echo '<script>selecionar('.$index.');</script>';
                        }

                        $index++;
                    }
                        
                    echo '</div>';
                    break;

                    case "choicePhaserBlockly":
                    echo '<div class="options-wrapper">';

                     echo '<input id="answer-input" type="text" name="answer" hidden>';

                    $saved_answer = [];
                        
                    if($_SESSION["answers"][$_SESSION["currentTask"]] != null)
                        $saved_answer = explode (",", $_SESSION["answers"][$_SESSION["currentTask"]]);

                    $index = 0;
                    foreach ($task["options"] as $opt) {
                        echo '<button type="button" class="phaser-option opt-button" onclick="selecionar_blockly('.$index.')">';
                        echo '<span id="span'.$index.'" style="display: none">'.$opt["text"].'</span>';
                        echo '<div id="blocklyDivOp'.$index.'" class="phaser-injection"></div>';
                        echo '</button>';

                        if (in_array($index, $saved_answer)) {
                            echo '<script>selecionar('.$index.');</script>';
                        }

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
</div>
<?php 
    if($task["type"] == "choiceBlockly"){
        echo '<script src="/assets/js/blockly/choiceBlockly.js"></script>';
    }
    else if($task["type"] == "choicePhaserBlockly"){
        echo '<script src="/assets/js/blockly/choiceBlocklyPhaser.js"></script>';
    }
?> 
