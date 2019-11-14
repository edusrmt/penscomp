<?php
session_start();
require_once(__DIR__."/../../../webform/utils.php");
require_once(__DIR__."/../../../../models/Tasks.php");

use Application\models\Tasks;
use Application\models\Input;
use Application\models\Choice;

if( isset($_SESSION['WARNING']) && !is_null($_SESSION['WARNING'])){
    $errors = $_SESSION['WARNING'];
    print 'Avisos: <ul><li>';
    print implode('</li><li>', $errors);
    print '</li></ul>';
    unset($_SESSION['WARNING']);
}

//Opções do SelectBox, onde a chave da array é o "value" do select e os dados o nome da opção
//que vai ser mostrada ao usuario.
$pairsTarefas = array( "input"=>"Entrada", "choice"=>"Múltipla Escolha" );


//== MENU
print "<form name=\"fmSelecionarTarefa\" method=\"get\"  id=\"form1\">";
print "<table> <tr><td>";
wfInput("iptSearch", "text");
print "</td><td>";
wfSelectBox("sbTarefas", $pairsTarefas , "input", 'input');
print "</td><td>";
wfButton("btnCriar", "submit", "Criar", null, null, false, "form1", "./criar.php");
wfButton("btnFiltrar", "submit", "Filtrar",null, null, false, "form1", "./index.php");
print "</td></td></tr> </table>";
print "</form>";
//== FIM DO MENU

//== PEGANDO INFORMAÇÕES DO FIREBASE
$arr = array();
$tasks = new Tasks();
if( isset($_SESSION['SEARCH_FIELD']) && !is_null($_SESSION['SEARCH_FIELD']) ){
    /*TODO*/
    //FILTRANDO INFORMAÇÕES
    $input1 = new Input(
        "157",
        "O pequeno filtrado",
        "Corpo da questão do pequeno fitrado.",
        "FF"
    );
    $arr[] = $input1;
}else{
    $arr = $tasks->getTasks('input');
}
//== FIM DA COLETA DE INFORMAÇÕES

print "<form id='formTabela'><table class=\"table\">
  <thead>
    <tr>
      <th scope=\"col\">#</th>
      <th scope=\"col\">Título</th>
      <th scope=\"col\">Chave da Questão</th>
      <th scope=\"col\">Corpo da Questão</th>
      <th scope=\"col\">#</th>
    </tr>
  </thead> 
  <tbody>";

foreach ( $arr as $id => $value){
    print "
    <tr>
        <th scope='row'>$id</th>
        <td>" .$value->getTitle()."</td>
        <td>" .$value->getKey()."</td>
        <td>" .$value->getStatement()."</td> 
        <td><button name='btnDetalhar' type=\"submit\" formaction=\"./exibir.php\" formmethod='get' value=\"".$value->getKey()."\">Detalhar</button></td></tr>"   ;
}
print "</tbody></table></form>";