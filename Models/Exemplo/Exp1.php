<?php
require_once __DIR__ .  '/../Models/Tasks.php'; //< Inclui também as classes das tarefas.

$task = new Tasks();

// Construtor do Input: ( string $_title, $_statement, string $_rightAnswer )

$input1 = new Input(
  'Input Exemplo 1',
  'Corpo da questão de input exemplo1 1',
  'Correto'
);

$input2 = new Input(
    'Input Exemplo 1',
    'Alterando Exemplo 1',
    'Correto'
);

// var_dump é uma função PHP que imprime o valor e o tipo da variavel. Usando apenas para ver o tipo da variavel.

//VAR_DUMP não é necessario para usar as funções!

// Inserindo dados de uma tarefa input no firebase.
// Não tem como adicionar tarefas com o mesmo titulo.
// O titulo é considero o key do nó.
var_dump( $task->setInput( $input1 ) ); //< A função retorna true caso for adicionado.

// Obtendo dados de uma tarefa input especifica.
$getInput = $task->getInputEqualTo( 'Input Exemplo 1' ); //< Retorna um objeto Input

// Utilizando os gets do Input para imprimir informações.
var_dump( $getInput->getTitle() );
var_dump( $getInput->getRightAnswer() );
var_dump( $getInput->getStatement() );

// Atualizando o nó no firebase. O titulo do objeto input deve ser igual ao titulo do nó que queremos alterar.
// Não tem como alterar o titulo.
var_dump( $task->updateInput( $input2 ) ); //<true caso seja alterado.

// Remove tarefa input do banco de dados
var_dump( $task->removeInput( 'Input Exemplo 1' ) ); //<true caso o item seja removido

$arr = [
    '0' => [ 'text' => 'primeiro'],
    '1' => [ 'text' => 'terca'],
    '2' => [ 'text' => 'segunda']
];

$choice = new Choice(
    'Exemplo Choice 1',
    'Corpo da questão.',
    $arr,
    '0',
    'Horiz'
);

$task->setChoice( $choice );
