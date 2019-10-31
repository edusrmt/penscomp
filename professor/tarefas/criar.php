<?php
require_once __DIR__.'/../../Models/Tasks.php';
print "Antes da clase";
$task = new Tasks();
print 'Antes de chamar função';
$inputs =  $task->getTasks('input');
print "Depois do TASK";
foreach ( $inputs as $key => $input ){
    print "1".PHP_EOL;
    print "Array ".$key.PHP_EOL;
    print "Titulo: ".$input->getTitle().PHP_EOL;
}
print '2'.PHP_EOL;


