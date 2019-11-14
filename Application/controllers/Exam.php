<?php

use Application\core\Controller;

class Exam extends Controller
{
    public function start () {
        $Exams = $this->model('Exams');
        $exam = $Exams::loadExam();

        //session_start();
        $_SESSION['currentTask'] = 0;
        $_SESSION['examSize'] = count($exam);

        $answers = array_fill(0, $_SESSION['examSize'], null);
        $_SESSION["answers"] = $answers;

        $this->render($exam[0]);
    }

    public function next () {
        $Exams = $this->model('Exams');
        $exam = $Exams::loadExam();

        //session_start();
        $_SESSION["currentTask"] += 1;

        if ($_SESSION["currentTask"] >= $_SESSION['examSize'])
            $_SESSION['currentTask'] = 0;

        $this->render($exam[$_SESSION['currentTask']]);
    }

    public function prev () {
        $Exams = $this->model('Exams');
        $exam = $Exams::loadExam();

        //session_start();
        $_SESSION["currentTask"] -= 1;

        if ($_SESSION["currentTask"] < 0)
            $_SESSION['currentTask'] = $_SESSION['examSize'] - 1;

        $this->render($exam[$_SESSION['currentTask']]);
    }

    public function open($index) {
        $Exams = $this->model('Exams');
        $exam = $Exams::loadExam();

        //session_start();
        $_SESSION["currentTask"] = $index;

        $this->render($exam[$_SESSION['currentTask']]);
    }

    public function answer() {
        //session_start();
        $_SESSION["answers"][$_SESSION["currentTask"]] = $_POST["answer"];
        $this->next();
    }

    public function end() {
        $Exams = $this->model('Exams');
        $data = $Exams::loadExam();

        $this->view('exam/end');
    }

    public function finish() {
        // SALVAR RESPOSTAS, ETC.
        $this->view('task/index');
    }

    private function render($data) {
        $this->view('exam/viewer', ['task' => $data]);
    }
}
