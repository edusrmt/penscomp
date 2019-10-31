# AUTORES
1. Iury Lamonie Fernandes do Nascimento ~~(ilamonie@ufrn.edu.br)~~

# SOBRE O PROJETO
Esse projeto contém a implementação dos modelos das classes das tarefas do projeto **PensComp**.
1. ```Tasks.php```: Classe que faz a comunicação com a API do Firebase Realtime Database,
contém a implementação de métodos de inserção, remoção, atualização e obtenção de dados de cada
tipo de tarefa.
2. ```Input.php```: Classe modelo para as *tasks input*.
3. ```Choice.php```: Classe modelo para as *tasks choice*.
# Compilar
1. Cria uma variavel ambiente utilizando ```export GOOGLE_APPLICATION_CREDENTIALS="secret/penscomp-ufrn-695c402a62de.json"```;
### Funções da class Tasks
~~Crie um objeto do tipo especifico da tarefa antes de passar como argumento da função.~~
1. ```setInput( Input $input );```
2. ```getInputEqualTo( string $title );```
3. ```updateInput( Input $newInput );```
4. ```removeInput( string $title );```
5. ```setChoice( Choice $choice );```
6. ```getChoiceEqualTo( string $title );```
7. ```updateChoice( Choice $newChoice );```
8. ```removeChoice( string $title );```

### Informações da classe Choice.
O atributo ```options``` da classe é uma array de arrays na qual sua estrutura deve
ser como seguinte ``` $nomeArray = [ '0' => ['tipoOpção'=>'valorOpção'] ]```.
Exemplo retirada de uma questão: ```$arr = [ '0' => ['text' => 'segunda'], '1' => ['text' => 'terla'] ];```
. ~~Foi feito assim para respeitar a estrura do json com o firebase.~~