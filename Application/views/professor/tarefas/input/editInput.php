<?php

require_once(__DIR__.'/../../../../models/Tasks.php');
use Application\models\Tasks;
Use Application\models\Input;

if( array_key_exists('REQUESt_METHOD', $_SERVER)){
    if( $_SERVER['REQUEST_METHOD'] == 'POST'){
        $erros = array();
        if( strlen($_POST['iptTitle']) == 0 ){
            $erros[] = ' Informe o Título.';
        }
        if( strlen($_POST['iptStatement']) == 0 ){
            $erros[] = ' Informe o Corpo da Questão.';
        }
        if( strlen($_POST['iptRightAnswer']) == 0 ){
            $erros[] = ' Informe a Resposta Correta.';
        }

        if($erros){
            session_start();
            $_SESSION['WARNING'] = $erros;
            $_SESSION['TASK_TYPE'] = 'input';
            $_SESSION['title'] = $_POST['iptTitle'];
            $_SESSION['statement'] = $_POST['iptStatement'];
            $_SESSION['rightAnswer'] = $_POST['iptRightAnswer'];
            header("Location: ./../editar.php");
        }
        else{
            session_start();
            $task = new Tasks();
            $input = new Input(
                $_SESSION['TASK_KEY'],
                $_POST['iptTitle'],
                $_POST['iptStatement'],
                $_POST['iptRightAnswer']
            );
            if( $task->updateInput($input) ){
                session_start();
                $erros[] = "Alteração Feita com Sucesso.";
                $_SESSION['WARNING'] = $erros;
                $_SESSION['TASK_TYPE'] = 'input';
                header("Location: ./../exibir.php");
            } else {
                session_start();
                $erros[] = "Erro ao tentar atualizar a tarefa.";
                $_SESSION['WARNING'] = $erros;
                header("Location: ./../editar.php");
            }
        }

    }
} else header("Location: ./../index.php");