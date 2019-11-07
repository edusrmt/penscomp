<?php

use Application\core\Controller;

class Task extends Controller
{
  /*
  * chama a view index.php do  /panel   ou somente   /
  */
  public function index()
  {
    $this->view('task/index');
  }
}
