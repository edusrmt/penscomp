##SOBRE OS ARQUIVOS MASTER.PHP
1.  O arquivo ```professor/master.php``` é o modelo padrão das páginas principais das opções, como por exemplo ```tarefas/index.php``` ;
2.  Os arquivos ```master.php``` localizados dentro dsa 'pastas opções' dentro de ```professor``` são os modelos padrões das páginas dessa opção, como por exemplo ```professor/tarefas/master.php``` é modelo para as páginas ```tarefas/criar.php```, ```tarefas/editar.php```, etc;

##SOBRE A PASTA ```TAREFAS```
Ela contém o CRUD das tarefas que estão relacionadas com o Cloud Firestore. As páginas são carregas de forma diferente para o tipo de tarefa selecionado, pois cada tipo de tarefa exige sempre algum tipo informação difenrete da outra.
1.  As páginas de CRUD localizadas dentro de ```professor/tarefas``` vão ser 'montadas' de acordo com o tipo de tarefa selecionada, por exemplo a página ```tarefas/criar.php``` vai mostrar ```tarefas/choice/criar.php``` se a opção tarefa de Multipla-escolha estiver selecionada;
2.  Por padrão o tipo de tarefa é do tipo 'Entrada' (input).

##SOBRE O USO DE ELEMENTOS HTML
Alguns elementos HTML estão sendo criados utilizando funções PHP para facilitar correções futuras, pois caso exista a necessidade de fazer mudanças em algum elemento HTML apenas precisamos mexer na função que o cria e assim modificamos todas.
1. As funções estão localizadas em ```views/webform/utils.php```;
2. Apenas os Select Box, Input (toos), Button e HyperLink A(\<a>) estão sendo criadoS com essas funções. EM ALGUNS CASOS NÃO UTILIZO ELAS POR CAUSA DE ALGUM BUG;
3. As funções dão suporte a uso da class para estilizalas;
4. Os parametros dessas funções são iguais as chaves dos elementos de marcação HTML, por exemplo o parametro ```$name``` cria um elemento HTML com ```<button name=$name></button>```;
5.  Existe um parametro ```$class``` nas funções para estilizar o elemento;

Utilizo os marcadores ```<ul> ``` ```<li>``` para dar avisos no sistema, como por exemplo quando "FALHA EM CRIAR UM TAREFAS" no ```tarefas/criar.php```. ```<table>``` para exibir a lista de tarefas no ```tarefas/index.html```.