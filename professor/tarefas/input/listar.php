<?php
require_once(__DIR__."/../../../php/webforms/utils.php");
require_once(__DIR__."/../../../Models/Tasks.php");

$arr = array();

if(  isset($_SESSION['TASK_TYPE']) && !is_null($_SESSION['TASK_TYPE'])  && $_SESSION['TASK_TYPE'] == 'input'){
    if( isset($_SESSION['SEARCH_FIELD'])){
        if( !is_null($_SESSION['SEARCH_FIELD']) ){
            // TODO
            //filtrar o conjunto de dados
            $input1 = new Input(
                "157",
                "O pequeno filtrado",
                "Corpo da questão do pequeno fitrado.",
                "FF"
            );
            array_push($arr,  $input1);
        }
    }
    else {
        $input1 = new Input(
            "123456",
            "O pequeno menino",
            "Corpo da questão do pequeno menino.",
            "ABC"
        );
        $input2 = new Input(
            "323456",
            "O grande menino",
            "Corpo da questão do grande menino.",
            "DBA"
        );

        array_push($arr,  $input1);
        array_push($arr,  $input2);
    }
}

//== PARTE COMUM NAS PÁGINAS LISTAR DAS TAREFAS

//Opções do SelectBox, onde a chave da array é o "value" do select e os dados o nome da opção
//que vai ser mostrada ao usuario.
$pairsTarefas = array( "input"=>"Entrada", "choice"=>"Múltipla Escolha" );

print "<form name=\"fmSelecionarTarefa\" method=\"get\" action=\"./index.php\" id=\"form1\">";
print "<table> <tr><td>";
wfInput("iptSearch", "text");
print "</td><td>";
wfSelectBox("sbTarefas", $pairsTarefas , "input");
print "</td><td>";
wfButton("btnCriar", "button", "Criar");
wfButton("btnFiltrar", "submit", "Filtrar",null, null, false, "form1");
print "</td></td></tr> </table>";
print "</form>";



print "<form id='formTabela'><table class=\"table\">
  <thead>
    <tr>
      <th scope=\"col\">#</th>
      <th scope=\"col\">Title</th>
      <th scope=\"col\">Key</th>
      <th scope=\"col\">Statement</th>
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

//== FIM DAS PARTES COMUM