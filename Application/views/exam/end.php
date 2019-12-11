<div class="viewer">
    <header id="viewer-header">
        <a href="/penscomp/exam/prev" class="navigation">< VOLTAR</a>
        <h1 class="logo">
            <a href="/penscomp/panel">Pens<span>comp</span></a>            
        </h1>
        <a class="navigation" href="/penscomp/exam/finish">ENVIAR EXAME ></a>
    </header>   

    <div class="answers-list">
        <table>
            <tr>
                <th>Questão</th>
                <th>Estado</th>
            </tr>

            <?php
                session_start();

                for($i = 0; $i < $_SESSION["examSize"]; $i++) {
                    echo '<tr><td>'.($i + 1).'</td><td>';

                    if ($_SESSION["answers"][$i] != null)
                        echo '<span class="done">Respondida</span>';
                    else
                        echo '<span class="undone">Pendente</span>';

                    echo '</td></tr>';
                }
            ?>

        </table>
    </div>  
</div>