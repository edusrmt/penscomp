<?php

require_once(__DIR__.'/../../../../models/Tasks.php');
use Application\models\Tasks;
use Application\models\Input;
use Application\models\Choice;

if(array_key_exists('REQUEST_METHOD', $_SERVER)){
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

       /* if( is_null($ok) || ($ok === false)){
            $erros[] = 'Opção da Resposta Correta Invalida. Entre com valor (0-6)';
        }*/

        if( strlen($_POST['iptOp1']) != 0 ) $op[] = array( 'text' => $_POST['iptOp1']);
        if( strlen($_POST['iptOp2']) != 0 ) $op[] = array( 'text' => $_POST['iptOp2']);
        if( strlen($_POST['iptOp3']) != 0 ) $op[] = array( 'text' => $_POST['iptOp3']);
        if( strlen($_POST['iptOp4']) != 0 ) $op[] = array( 'text' => $_POST['iptOp4']);
        if( strlen($_POST['iptOp5']) != 0 ) $op[] = array( 'text' => $_POST['iptOp5']);
        if( strlen($_POST['iptOp6']) != 0 ) $op[] = array( 'text' => $_POST['iptOp6']);
        if( strlen($_POST['iptOp7']) != 0 ) $op[] = array( 'text' => $_POST['iptOp7']);
        if( count($op) == 0 ) $erros[] = "Informe Opções pra Tarefa.";

        if($erros){
            session_start();
            $_SESSION['WARNING'] = $erros;
            $_SESSION['TASK_TYPE'] = 'choice';
            $_SESSION['title'] = $_POST['iptTitle'];
            $_SESSION['statement'] = $_POST['iptStatement'];
            $_SESSION['rightAnswer'] = $_POST['iptRightAnswer'];
            $_SESSION['op1'] = $_POST['iptOp1'];
            $_SESSION['op2'] = $_POST['iptOp2'];
            $_SESSION['op3'] = $_POST['iptOp3'];
            $_SESSION['op4'] = $_POST['iptOp4'];
            $_SESSION['op5'] = $_POST['iptOp5'];
            $_SESSION['op6'] = $_POST['iptOp6'];
            $_SESSION['op7'] = $_POST['iptOp7'];
            var_dump($erros);
            header("Location: ./../criar.php");
        }
        else {
            $task = new Tasks();
            $choice = new Choice(
                null,
                $_POST['iptTitle'],
                $_POST['iptStatement'],
                $op,
                $_POST['iptRightAnswer'],
                'horiz'
            );
            $resp = $task->setChoice($choice);
            if(is_null($resp)){
                $erros[] = "Erro ao Criar Tarefa.";
                session_start();
                $_SESSION['WARNING'] = $erros;
                $_SESSION['TASK_TYPE'] = 'choice';
                $_SESSION['title'] = $_POST['iptTitle'];
                $_SESSION['statement'] = $_POST['iptStatement'];
                $_SESSION['rightAnswer'] = $_POST['iptRightAnswer'];
                $_SESSION['op1'] = $_POST['iptOp1'];
                $_SESSION['op2'] = $_POST['iptOp2'];
                $_SESSION['op3'] = $_POST['iptOp3'];
                $_SESSION['op4'] = $_POST['iptOp4'];
                $_SESSION['op5'] = $_POST['iptOp5'];
                $_SESSION['op6'] = $_POST['iptOp6'];
                $_SESSION['op7'] = $_POST['iptOp7'];
                var_dump($erros);
                header("Location: ./../criar.php");
            } else{
                session_start();
                $_SESSION['TASK_TYPE'] = 'choice';
                $_SESSION['TASK_KEY'] = $resp;
                print "Deu certp";
                header('Location: ./../exibir.php');
            }
        }
    }
}else header("Location: ./../index.php");