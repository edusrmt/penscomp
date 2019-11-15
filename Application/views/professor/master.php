<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>PENSCOMP</title>
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="./../../../../css/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="./../../../../css/panel.css" /> -->

   <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   -->
</head>
<body>
<!-- PANEL -->
<aside class="sidebar">
    <!-- MENU -->
    <div class="menu-container">
        <h1 class="logo">
            <a href="./index.php">Pens<span>comp</span></a>
        </h1>
        <nav class="nav">
            <ul>
                <li><a>Início</a></li>
                <li class="active"><a>Tarefas</a></li>
                <li><a>Opções</a></li>
                <li><a>Sair</a></li>
            </ul>
        </nav>
    </div>
    <!-- MENU -->
</aside>
<section class="content">
    <div class="subjects-container">
        <?php include($page_content); ?>
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