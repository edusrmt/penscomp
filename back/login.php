<?php
    require_once '../vendor/autoload.php';
    
    use Kreait\Firebase\Factory;
    use Kreait\Firebase\ServiceAccount;
    use Kreait\Firebase\Auth;

    $serviceAccount = ServiceAccount::fromJsonFile('../secret/penscomp-ufrn-62ee288bba95.json');

    $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->create();

    $database = $firebase->getDatabase();
    $auth = $firebase->getAuth();
    $client = $auth->getApiClient(); 

    try {
        $user = $auth->getUserByEmail($_POST['email']);
    } catch (Exception $e) {
        echo $e->getMessage();
        header('Location: ../index.php');
    }

    echo $user->email;
    echo $user->passwordHash;
?>