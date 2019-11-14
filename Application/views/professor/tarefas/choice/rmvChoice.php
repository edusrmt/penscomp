<?php
require_once(__DIR__ . '/../../../../models/Tasks.php');

use Application\models\Tasks;

if (array_key_exists('REQUEST_METHOD', $_SERVER)) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $erros = array();
        session_start();
        if (isset($_SESSION['TASK_KEY']) && !is_null($_SESSION['TASK_KEY'])) {
            $task = new Tasks();
            if ($task->removeChoice($_SESSION['TASK_KEY'])) {
                $erros[] = 'Tarefa removida com sucesso.';
            } else {
                $erros[] = "Erro ao tentar delatar uma tarefa do tipo 'Múltipla Escolha' no Firebase.";
            }

        } else {
            $erros[] = "Erro ao tentar delatar uma tarefa do tipo 'Múltipla Escolha'.";
        }
        $_SESSION['WARNING'] = $erros;
        header("Location: ./../index.php");
    }
}