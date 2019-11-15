<?php
require_once(__DIR__.'/../../../../models/Tasks.php');
use Application\models\Tasks;
Use Application\models\Choice;

if( array_key_exists('REQUEST_METHOD', $_SERVER)){
    if( $_SERVER['REQUEST_METHOD'] == 'POST'){
        $erros = array();
        $op = array();
        if( strlen($_POST['iptTitle']) == 0 ){
            $erros[] = ' Informe o Título.';
        }
        if( strlen($_POST['iptStatement']) == 0 ){
            $erros[] = ' Informe o Corpo da Questão.';
        }
        if( strlen($_POST['iptRightAnswer']) == 0 ){
            $erros[] = ' Informe a Resposta Correta.';
        }
        $ok = filter_input(INPUT_POST, 'iptRightAnswer', FILTER_VALIDATE_INT,
            array( 'options' => array( 'min_range' => 0, 'max_range' => 6)));
        if( is_null($ok) || ($ok === false)){
            $erros[] = 'Opção da Resposta Correta Invalida. Entre com valor (0-6)';
        }

        if(array_key_exists('iptOp1', $_POST))
        {if( strlen($_POST['iptOp1']) != 0 ) $op[] = array( 'text' => $_POST['iptOp1']);}
        if(array_key_exists('iptOp2', $_POST))
        {if( strlen($_POST['iptOp2']) != 0 ) $op[] = array( 'text' => $_POST['iptOp2']);}
        if(array_key_exists('iptOp3', $_POST))
        { if( strlen($_POST['iptOp3']) != 0 ) $op[] = array( 'text' => $_POST['iptOp3']);}
        if(array_key_exists('iptOp4', $_POST))
        {if( strlen($_POST['iptOp4']) != 0 ) $op[] = array( 'text' => $_POST['iptOp4']);}
        if(array_key_exists('iptOp5', $_POST))
        { if( strlen($_POST['iptOp5']) != 0 ) $op[] = array( 'text' => $_POST['iptOp5']);}
        if(array_key_exists('iptOp6', $_POST))
        {if( strlen($_POST['iptOp6']) != 0 ) $op[] = array( 'text' => $_POST['iptOp6']);}
        if(array_key_exists('iptOp7', $_POST))
        {if( strlen($_POST['iptOp7']) != 0 ) $op[] = array( 'text' => $_POST['iptOp7']);}

        if( count($op) == 0 ) $erros[] = "Informe Opções pra Tarefa.";

        if($erros){
            session_start();
            $_SESSION['WARNING'] = $erros;
            $_SESSION['TASK_TYPE'] = 'choice';
            $_SESSION['title'] = $_POST['iptTitle'];
            $_SESSION['statement'] = $_POST['iptStatement'];
            $_SESSION['rightAnswer'] = $_POST['iptRightAnswer'];

            header("Location: ./../editar.php");
        }
        else {
            session_start();
            $task = new Tasks();
            $choice = new Choice(
                $_SESSION['TASK_KEY'],
                $_POST['iptTitle'],
                $_POST['iptStatement'],
                $op,
                $_POST['iptRightAnswer'],
                'horiz'
            );
            if( $task->updateChoice($choice) ){
                session_start();
                $erros[] = "Alteração Feita com Sucesso.";
                $_SESSION['WARNING'] = $erros;
                $_SESSION['TASK_TYPE'] = 'choice';
                header("Location: ./../exibir.php");
            } else {
                session_start();
                $erros[] = "Erro ao tentar atualizar a tarefa.";
                $erros[] = $choice->getKey();
                $_SESSION['WARNING'] = $erros;
                header("Location: ./../editar.php");
            }
        }
    }
} else header("Location: ./../index.php");