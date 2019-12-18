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
            <form id="formTabela" class="crud-list" method="POST">
                <table>
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Resposta</th>
                        <th scope="col">Corpo</th>
                        <th scope="col">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">123</th>
                            <td>Mentiroso</td>
                            <td>Ele mente somente aos sábados</td>
                            <td>Uma pessoa é bastante mentirosa bla bla bla bla bla mais um pouco pra testar</td>
                            <td><button name='btnDetalhar' type="submit" formaction="/penscomp/professor/edit" value="input" title="Editar">&#9998</button>
                            <button name='btnDetalhar' type="submit" formaction="/penscomp/professor/delete" value="input" title="Apagar">&#9940;</button></td>
                        </tr>
                        <tr>
                            <th scope="row">452</th>
                            <td>Trem</td>
                            <td>ABEDC</td>
                            <td>O trem percorre qual caminho?</td>
                            <td><button name='btnDetalhar' type="submit" formaction="/penscomp/professor/edit" value="input" title="Editar">&#9998</button>
                            <button name='btnDetalhar' type="submit" formaction="/penscomp/professor/delete" value="input" title="Apagar">&#9940;</button></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</section>
<!-- PANEL -->