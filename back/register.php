<?php
    require_once '../vendor/autoload.php';
    
    use Kreait\Firebase\Factory;
    use Kreait\Firebase\ServiceAccount;
    use Kreait\Firebase\Exception\Auth;

    $serviceAccount = ServiceAccount::fromJsonFile('../secret/penscomp-ufrn-62ee288bba95.json');

    $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->create();

    $database = $firebase->getDatabase();
    $auth = $firebase->getAuth();   

    $user_name = $_POST["name"];
    $user_email = $_POST["email"];
    $user_password = $_POST["password"];

    $userProperties = [
        'email' => $user_email,
        'emailVerified' => false,
        'password' => $user_password,
        'displayName' => $user_name,
    ];
    
    try {
        $createdUser = $auth->createUser($userProperties);
    } catch (Exception $e) {
        session_start();
        $_SESSION['error'] = $e->getMessage();
    }

    header('Location: ../index.php');
?>