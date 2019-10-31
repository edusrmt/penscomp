
<?php

require_once __DIR__. "/../../vendor/autoload.php";

use Google\Cloud\Firestore\FirestoreClient;

$db = new FirestoreClient();
printf('Created Cloud Firestore client with default project ID.' . PHP_EOL);

$data = [
   'title' => 'Questão Teste de Trem',
   'statement' => 'Essa questão foi criada para testar o id automatico que foi criado.',
    'rightAnswer' => 'Deu Certo'
];
/*try{
    $db->collection('input')->add($data);
}catch (Exception $exception){
    printf("erro");
}*/

//var_dump($db->collections()->current());
/*$snapshot = $db->collection('input')->orderBy('title','asc')->documents();
foreach ($snapshot as $pepa){
    printf('Tarefa: %s' . PHP_EOL, $pepa->id());
    printf('Titulo: %s' . PHP_EOL, $pepa['title']);
}*/

$docRef = $db->collection('input')->document("463e0fd113214cecb442")->snapshot();

