<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>PENSCOMP</title>
    <link rel="stylesheet" type="text/css" media="screen" href="../css/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../css/panel.css" />
</head>
<body>
    <!-- PANEL -->
    <aside class="sidebar">
        <!-- MENU -->
        <div class="menu-container">
            <h1 class="logo">
                <a href="./panel.php">Pens<span>comp</span></a>            
            </h1>
            <nav class="nav">
                <ul>
                    <li class="active"><a href="./panel.php">Início</a></li>
                    <li><a href="./tasks.php">Atividades</a></li>
                    <li><a href="./panel.php">Opções</a></li>
                    <li onclick="logout();"><a>Sair</a></li>
                </ul>
            </nav>
        </div>            
        <!-- MENU -->
    </aside>
    <section class="content">
    <div class="subjects-container">
    </div>
    </section>
    <!-- PANEL -->

    <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/5.10.1/firebase-app.js"></script>

    <!-- Add Firebase products that you want to use -->
    <script src="https://www.gstatic.com/firebasejs/5.10.1/firebase-auth.js"></script>

    <script src="../js/panel.js"></script>
</body>
</html>