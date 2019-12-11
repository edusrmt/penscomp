<?php
    require_once './vendor/autoload.php';
    
    use Kreait\Firebase\Factory;
    use Kreait\Firebase\ServiceAccount;

    $serviceAccount = ServiceAccount::fromJsonFile('./secret/penscomp-ufrn-62ee288bba95.json');

    $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->create();

    $database = $firebase->getDatabase();
    $auth = $firebase->getAuth();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>PENSCOMP</title>
    <link rel="stylesheet" type="text/css" media="screen" href="/public/assets/css/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="/public/assets/css/sign-form.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="/public/assets/css/home.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="/public/assets/css/menu.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="/public/assets/css/tasks.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="/public/assets/css/viewer.css" />

    <?php
        session_start();

        if (isset($_SESSION['error'])) {
            echo '<script type="text/javascript">';
            echo ' alert("'.$_SESSION['error'].'")';  //not showing an alert box.
            echo '</script>';
            $_SESSION['error'] = null;
        }
    ?>
</head>
<body>
    <?php
        require './Application/autoload.php';

        use Application\core\App;
        use Application\core\Controller;

        $app = new App();
    ?>

    
    <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/5.10.1/firebase-app.js"></script>

    <!-- Add Firebase products that you want to use -->
    <script src="https://www.gstatic.com/firebasejs/5.10.1/firebase-auth.js"></script>

    <script src="/public/assets/js/home.js"></script>
</body>
</html>
