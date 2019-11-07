<?php

use Application\core\Controller;

class Panel extends Controller
{
  /*
  * chama a view index.php do  /panel   ou somente   /
  */
  public function index()
  {
    $this->view('panel/index');
  }
}
