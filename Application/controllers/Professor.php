<?php

use Application\core\Controller;

class Professor extends Controller
{
  /*
  * chama a view index.php do  /home   ou somente   /
  */
  public function index()
  {
    $this->view('professor/index');
  }

  public function create() {
    $type = "input";

    if (isset($_POST["sbTarefas"]) && !is_null($_POST["sbTarefas"])) {
        $type = $_POST["sbTarefas"];
    }

    switch ($type) {
        case "input":
            $this->view('professor/create-input');
        break;

        case "choice":
            $this->view('professor/create-choice');
        break;

        default:
            $this->view('professor/index');
        break;
    }
  }

  public function store() {
      // Cria uma nova questão no firebase ou edita se for o caso
      $this->view('professor/index');
  }

  public function list() {
    $type = "input";

    if (isset($_POST["sbTarefas"]) && !is_null($_POST["sbTarefas"])) {
        $type = $_POST["sbTarefas"];
    }

    switch ($type) {
        case "input":
            $this->view('professor/list-input');
        break;

        case "choice":
            $this->view('professor/list-choice');
        break;

        default:
            $this->view('professor/index');
        break;
    }
  }

  public function edit() {
    $type = "input";

    if (isset($_POST["btnDetalhar"]) && !is_null($_POST["btnDetalhar"])) {
        $type = $_POST["btnDetalhar"];
    }

    // Nesse caso, teria que selecionar o tipo de página de acordo com o tipo encontrado pelo id
    switch ($type) {
        case "input":
            $this->view('professor/edit-input');
        break;

        case "choice":
            $this->view('professor/edit-choice');
        break;

        default:
            $this->view('professor/index');
        break;
    }
  }

  public function delete() {
    $this->view('professor/index');
  }
}
