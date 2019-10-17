<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>PENSCOMP</title>
    <link rel="stylesheet" type="text/css" media="screen" href="../css/style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="../css/tasks.css" />
</head>
<body>
    <?php 
        session_start();
        //$_SESSION["init"] = 0;
    ?>
    <!-- PANEL -->
    <aside class="sidebar">
        <!-- MENU -->
        <div class="menu-container">
            <h1 class="logo">
                <a href="./panel.php">Pens<span>comp</span></a>            
            </h1>
            <nav class="nav">
                <ul>
                    <li><a href="./panel.php">Início</a></li>
                    <li class="active"><a href="./tasks.php">Atividades</a></li>
                    <li><a href="./panel.php">Opções</a></li>
                    <li><a href="../index.php">Sair</a></li>
                </ul>
            </nav>
        </div>            
        <!-- MENU -->
    </aside>
    <section class="content">    
        <app-test-alert></app-test-alert>
        <div class="subjects-container">
            <!-- ADAPTATIVE -->
            <div class="adaptative subject-container">
                <div class="header-wrapper">
                    <img class="icon" src="../img/subject-icon.png" />
                    <div class="info">
                        <h2>Estudo adaptativo</h2>
                        <br>
                        <a href="../back/exam.php"><button><span>Iniciar</span></button></a>
                    </div>
                    <div class="progress-block">
                        <span class="label">60<span class="smaller">%</span></span>
                        <span class="progress"></span>
                    </div>
                </div>
            </div>
            <!-- ADAPTATIVE -->
            <div class="subject-container">
                <div class="header-wrapper">
                    <img class="icon" src="../img/subject-icon.png" />
                    <div class="info">
                        <h2>Nome do assunto</h2>
                        <p>10 exercícios</p>
                        <a href="../back/exam.php"><button><span>Iniciar</span></button></a>
                    </div>
                    <div class="progress-block">
                        <span class="label">60<span class="smaller">%</span></span>
                        <span class="progress"></span>
                    </div>
                </div>
            </div>
            <div class="subject-container">
                <div class="header-wrapper">
                    <img class="icon" src="../img/subject-icon.png" />
                    <div class="info">
                        <h2>Nome do assunto</h2>
                        <p>10 exercícios</p>
                        <a href="../back/exam.php"><button><span>Iniciar</span></button></a>
                    </div>
                    <div class="progress-block">
                        <span class="label">60<span class="smaller">%</span></span>
                        <span class="progress"></span>
                    </div>
                </div>
            </div>
            <div class="subject-container">
                <div class="header-wrapper">
                    <img class="icon" src="../img/subject-icon.png" />
                    <div class="info">
                        <h2>Nome do assunto</h2>
                        <p>10 exercícios</p>
                        <a href="../back/exam.php"><button><span>Iniciar</span></button></a>
                    </div>
                    <div class="progress-block">
                        <span class="label">60<span class="smaller">%</span></span>
                        <span class="progress"></span>
                    </div>
                </div>
            </div>
            <div class="subject-container">
                <div class="header-wrapper">
                    <img class="icon" src="../img/subject-icon.png" />
                    <div class="info">
                        <h2>Nome do assunto</h2>
                        <p>10 exercícios</p>
                        <a href="../back/exam.php"><button><span>Iniciar</span></button></a>
                    </div>
                    <div class="progress-block">
                        <span class="label">60<span class="smaller">%</span></span>
                        <span class="progress"></span>
                    </div>
                </div>
            </div>
            <div class="subject-container">
                <div class="header-wrapper">
                    <img class="icon" src="../img/subject-icon.png" />
                    <div class="info">
                        <h2>Nome do assunto</h2>
                        <p>10 exercícios</p>
                        <a href="../back/exam.php"><button><span>Iniciar</span></button></a>
                    </div>
                    <div class="progress-block">
                        <span class="label">60<span class="smaller">%</span></span>
                        <span class="progress"></span>
                    </div>
                </div>
            </div>
        </div>
        </section>
    <!-- PANEL -->
</body>
</html>