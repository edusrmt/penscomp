<!-- PANEL -->
<aside id="sidebar">
    <!-- MENU -->
    <div class="menu-container">
        <h1 class="logo">
            <a href="/penscomp/panel">Pens<span>comp</span></a>            
        </h1>
        <nav class="nav">
            <ul>
                <li><a href="./panel.php">Início</a></li>
                <li class="active"><a href="/penscomp/task">Tarefas</a></li>
                <li><a href="/penscomp/panel">Opções</a></li>
                <li onclick="logout();"><a href="/penscomp/home">Sair</a></li>
            </ul>
        </nav>
    </div>            
    <!-- MENU -->
</aside>
<section id="page-content">
    <div class="crud-container">
        <div class="crud-content crud-create">            
            <h1>Editar Questão</h1>
            <form id="formCriarInput" method="POST" action="/penscomp/professor/store">
                <label for="iptTitle">Nome</label>
                <input id="iptTitle" name="iptTitle" type="text">
                <br />
                <label for="iptStatement">Corpo da Questão</label>
                <textarea id="iptStatement" name="iptStatement" rows="10" cols="60"></textarea>
                <br />
                <div class="opt-create">
                    <label for="iptOp1">Opção 1:</label>
                    <input id="iptOp1" name="iptOp1" id="iptOp1" type="text">
                    <br />
                    <label id="ptOp2" for="iptOp2">Opção 2:</label>
                    <input id="iptOp2" name="iptOp2" id="iptOp2" type="text">
                    <br />
                    <label for="iptOp3">Opção 3:</label>
                    <input id="iptOp3" name="iptOp3" id="iptOp3" type="text">
                    <br />
                    <label for="iptOp4">Opção 4:</label>
                    <input id="iptOp4" name="iptOp4" id="iptOp4" type="text">
                    <br />
                    <label for="iptOp5">Opção 5:</label>
                    <input id="iptOp5" name="iptOp5" id="iptOp5" type="text">
                    <br />
                    <label for="iptRightAnswer">Opção Correta (Número): </label>
                    <input id="iptRightAnswer" name="iptRightAnswer" type="number" min="1" max="5" value="1" onkeydown="return false"><br />
                </div>
                <button name="btnCriar" type="submit" class="special-btn" form="formCriarInput">Salvar</button>
            </form>
        </div>
    </div>
</section>
<!-- PANEL -->