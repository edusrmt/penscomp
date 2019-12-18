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
            <form name="fmSelecionarTarefa" method="POST" action="/penscomp/professor/create" id="form1">
                <select name="sbTarefas" class="input">
                        <option value="input" selected>Entrada</option>
                        <option value="choice">Múltipla Escolha</option>
                    </select>
                <button name="btnMudar" type="submit" class="crud-button" form="form1">Mudar Tipo</button></td>
            </form>
            <h1>Nova Questão</h1>
            <form id="formCriarInput" method="POST" action="/penscomp/professor/store">
                <label for="iptTitle">Nome</label>
                <input id="iptTitle" name="iptTitle" type="text">
                <br />
                <label for="iptStatement">Corpo da Questão</label>
                <textarea id="iptStatement" name="iptStatement" rows="15" cols="60"></textarea>
                <br />
                <label for="iptRightAnswer">Resposta Correta</label>
                <input name="iptRightAnswer" type="text"><br />
                <button name="btnCriar" type="submit" class="special-btn" form="formCriarInput">Criar</button>
            </form>
        </div>
    </div>
</section>
<!-- PANEL -->

