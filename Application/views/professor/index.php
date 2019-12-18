<!-- PANEL -->
<aside id="sidebar">
    <!-- MENU -->
    <div class="menu-container">
        <h1 class="logo">
            <a href="/penscomp/panel">Pens<span>comp</span></a>            
        </h1>
        <nav class="nav">
            <ul>
                <li><a href="/penscomp/panel">Início</a></li>
                <li class="active"><a href="/penscomp/professor">Tarefas</a></li>
                <li><a href="/penscomp/panel">Opções</a></li>
                <li onclick="logout();"><a href="/penscomp/home">Sair</a></li>
            </ul>
        </nav>
    </div>            
    <!-- MENU -->
</aside>
<section id="page-content">
    <div class="crud-container">
        <div class="crud-content">
            <form name="fmSelecionarTarefa" method="POST" id="form1" class="crud-index">
                <input name="iptSearch" type="text" placeholder="Buscar tarefa">
                <select name="sbTarefas" class="input">
                    <option value="input" selected>Entrada</option>
                    <option value="choice">Múltipla Escolha</option>
                </select>
                <button name="btnCriar" type="submit" class="crud-button" form="form1" formaction="/penscomp/professor/create">Criar</button>
                <button name="btnFiltrar" type="submit" class="crud-button" form="form1" formaction="/penscomp/professor/list">Buscar</button>
            </form>
        </div>
    </div>
</section>
<!-- PANEL -->