<?php
    require_once './vendor/autoload.php';
    
    use Kreait\Firebase\Factory;
    use Kreait\Firebase\ServiceAccount;

    $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/secret/penscomp-ufrn-62ee288bba95.json');

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
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="css/home.css" />
    

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
    <!-- HOME -->
    <aside class="sidebar">
        <!-- SIGN-FORM -->
        <div class="sign-container">
            <div id="signin" class="signin">        
                <h2 onclick="slide_up(false)" class="form-title"><span>ou</span>Entrar</h2>
                    <div class="form-holder">                    
                        <input type="email" class="input" id="login-email" placeholder="Email" />
                        <input type="password" class="input" id="login-password" name="password" placeholder="Senha" />                    
                    </div>
                    <button id="login-button" onclick="login();" class="submit-btn">Entrar</button>

            </div>
            <div id="signup" class="signup slide-up">
                <div class="center">
                <h2 onclick="slide_up(true)" class="form-title"><span>ou</span>Registrar</h2>
                <form method="POST" action="../back/register.php">
                    <div class="form-holder">                    
                        <input type="text" class="input" name="name" placeholder="Nome" />
                        <input type="email" class="input" name="email" placeholder="Email" />
                        <input type="password" class="input" name="password" placeholder="Senha" />                    
                    </div>
                    <input type="submit" class="submit-btn" value="Registrar">
                </form>
            </div>
            </div>      
        </div>	
        <!-- SIGN-FORM -->
    </aside>
    <section class="content">
        <div class="logo-container">
            <h1 class="logo">
                <a href="./index.php">Pens<span>comp</span></a>            
            </h1>
            <h2 class="gradient-multiline"><span>Um novo jeito de capacitar programadores.</span></h2>
        </div>
    </section>
    <!-- HOME -->

    <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/5.10.1/firebase-app.js"></script>

    <!-- Add Firebase products that you want to use -->
    <script src="https://www.gstatic.com/firebasejs/5.10.1/firebase-auth.js"></script>

    <script src="js/home.js"></script>
</body>
</html>
