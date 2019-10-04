<?php

/**
 * @author Iury Lamonie
 * @date 27/09/2019
 * @brief A classe Tasks é responsavel pelo CRUD das tarefas no Firebase utilizando Realtime Database API. A versão da API para PHP não suporta 'event listeners'.
 * @version 0.0.2
 * @lastUpdate 04/10/2019
 */

require_once './vendor/autoload.php';
require_once 'Choice.php';
require_once 'Input.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

class Tasks
{

    public function __construct()
    {
        $acc = ServiceAccount::fromJsonFile('./secret/penscomp-ufrn-695c402a62de.json');
        $this->db = (new Factory)->withServiceAccount($acc)->createDatabase();
        $this->refInput = $this->db->getReference('tasks')->getChild('input');
        $this->refChoice = $this->db->getReference('tasks/choice');
    }

    //== METODOS INPUT

    /**
     * @brief   Insere uma nova tarefa input no banco de dados.
     * @param Input $input  O input a ser inserido.
     * @return  bool true caso a nova tarefa input for inserida, false caso contrario.
     * @throws \Kreait\Firebase\Exception\ApiException
     */
    public function setInput( Input $input )
    {
        if ( is_null( $input->getTitle() ) ) { return false; }
        // Verifica se não existe uma tarefa com esse titulo no banco de dados
        if( !$this->refInput->getChild( $input->getTitle() )->getSnapshot()->exists() ) {
            $this->refInput->getChild( $input->getTitle() )->getChild( 'rightAnswer' )->set( $input->getRightAnswer() );
            $this->refInput->getChild( $input->getTitle() )->getChild( 'statement' )->set( $input->getStatement() );
            return true;
        } //<
        return false;
    }

    /**
     * @brief Obtem uma tarefa input do firebase com o titulo informado.
     * @param string $title Titulo do imput.
     * @return Input Retorna um input com as informações retiradas do firebase, caso o input não exista as informações vão está null.
     * @throws \Kreait\Firebase\Exception\ApiException
     */
    public function getInputEqualTo( string $title )
    {
        $ref = $this->refInput->getChild($title);
        $input = new Input(
            $title,
            $ref->getChild('rightAnswer')->getSnapshot()->getValue(),
            $ref->getChild('statement')->getSnapshot()->getValue()
        );

        return $input;
    }

    /**
     * @brief Atualizada um nó especifico de um tarefa input no firebase.
     * @param Input $newInput O novo imput, obs.: O titulo não pode ser alterado.
     * @return bool true caso a alteração seja concluida, false caso contrario.
     * @throws \Kreait\Firebase\Exception\ApiException
     */
    public function updateInput( Input $newInput )
    {
        $ref = $this->refInput->getChild( $newInput->getTitle() );

        if( $ref->getSnapshot()->exists() )
        {
            $ref->getChild('statement')->set($newInput->getStatement());
            $ref->getChild('rightAnswer')->set($newInput->getRightAnswer());
            return true;
        }

        return false;
    }

    /**
     * @brief Remove um nó especifico de uma tarefa input no firebase
     * @param $title Titlo do nó a ser deletado.
     * @return bool True caso o nó seja removido do banco, false caso contrario.
     * @throws \Kreait\Firebase\Exception\ApiException
     */
    public function removeInput( $title )
    {
        $ref = $this->db->getReference($this->dbname)->getChild($this->tn_input);
        if( $ref->getSnapshot()->hasChild($title) )
        {
            $ref->getChild($title)->remove();
            return true;
        }
    }

    //==  METODOS CHOICE

    /**
     * @brief Insere uma nova tarefa choice no banco de dados.
     * @param Choice $choice A choice a ser inserida.
     * @return bool True caso o novo nó da choice for adicionado ao banco de dados, false caso contrario.
     * @throws \Kreait\Firebase\Exception\ApiException
     */
    public function setChoice( Choice $choice )
    {
        $ref = $this->refChoice->getChild( $choice->getTitle() );
        if( !$ref->getSnapshot()->exists() )
        {
            $ref->getChild('statement')->set( $choice->getStatement() );
            $ref->getChild('options')->set( $choice->getOptions() );
            $ref->getChild('rightAnswer')->set( $choice->getRightAnswer() );
            $ref->getChild('layout')->set( $choice->getLayout() );
            return true;
        }
        return false;
    }

    /**
     * @brief Obtem uma tarefa choice do firebase com o titulo informado.
     * @param string $title Titulo da choice
     * @return Choice Uma tarefa choice com as informações retiradas do firebase, caso a tarefa não exista as inf são null.
     * @throws \Kreait\Firebase\Exception\ApiException
     */
    public function getChoiceEqualTo( string $title )
    {
        $ref = $this->refChoice->getChild($title);
        $choice = new Choice(
            $title,
            $ref->getChild('statement')->getSnapshot()->getValue(),
            $ref->getChild('options')->getSnapshot()->getValue(),
            $ref->getChild('rightAnswer')->getSnapshot()->getValue(),
            $ref->getChild('layout')->getSnapshot()->getValue()
        );
        return $choice;
    }

    /**
     * @brief Atualiza as informações de uma tarefa choice especifica no firebase.
     * @param Choice $newChoice Tarefa choice com as informações necessarias para alterar as informações.
     * @return bool True caso consiga alterar as informações da tarefa, false caso contrario.
     * @throws \Kreait\Firebase\Exception\ApiException
     */
    public function updateChoice( Choice $newChoice )
    {
        $ref = $this->refChoice->getChild($newChoice->getTitle() );
        if( $ref->getSnapshot()->exists() )
        {
            $ref->update([
                'statement' => $newChoice->getStatement(),
                'options' => $newChoice->getOptions(),
                'rightAnswer' => $newChoice->getRightAnswer(),
                'layout' => $newChoice->getLayout()
            ]);

            return true;
        }

        return false;
    }

    /**
     * @brief Remove uma tarefa choice do firebase com o titulo informado.
     * @param $title Titulo da choice que deseja remover.
     * @return bool True caso consiga removar do firebase, false caso contrario.
     * @throws \Kreait\Firebase\Exception\ApiException
     */
    public function removeChoice( $title )
    {
        $ref = $this->refChoice->getChild( $title );
        if( $ref->getSnapshot()->exists() )
        {
            $ref->remove();
            return true;
        }

        return false;
    }

    //== ATRIBUTOS

    /**
     * @var \Kreait\Firebase\Database Armazena uma referencia ao banco de dados do firebase.
     */
    private $db; //database
    /**
     * @var \Kreait\Firebase\Database\Reference Armazena uma referencia ao nó das tarefas Input.
     */
    private $refInput;
    /**
     * @var \Kreait\Firebase\Database\Reference Armazena uma referencia ao nó das tarefas choice.
     */
    private $refChoice;
}