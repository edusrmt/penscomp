<?php

require_once(__DIR__.'/../../../../models/Tasks.php');
use Application\models\Tasks;
Use Application\models\Input;


if(array_key_exists('REQUEST_METHOD', $_SERVER)){

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
            header("Location: ./../criar.php");
        }
        else {

            $task = new Tasks();

            $input = new Input(
                null,
                $_POST['iptTitle'],
                $_POST['iptStatement'],
                $_POST['iptRightAnswer']
            );
            print '<p>Antes do input</p>';
            $resp = $task->setInput($input);
            print '<p>Depois do input</p>';
            if(is_null($resp)){
                $erros[] = "Erro ao Criar Tarefa.";
                session_start();
                $_SESSION['WARNING'] = $erros;
                $_SESSION['TASK_TYPE'] = 'input';
                $_SESSION['title'] = $_POST['iptTitle'];
                $_SESSION['statement'] = $_POST['iptStatement'];
                $_SESSION['rightAnswer'] = $_POST['iptRightAnswer'];
                header("Location: ./../criar.php");
            } else{

                session_start();
                $_SESSION['TASK_TYPE'] = 'input';
                $_SESSION['TASK_KEY'] = $resp;
                header('Location: ./../exibir.php');
            }
        }
    }
}else header("Location: ./../index.php");