<?php
require_once __DIR__ .  '/../Tasks.php';
$task = new Tasks();
$input = $task->getInputEqualTo('Bolas');
var_dump($input);
$testI = new Input();
