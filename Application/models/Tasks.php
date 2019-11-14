<?php

namespace Application\models;

require_once __DIR__."/../../vendor/autoload.php";
require_once __DIR__."/Choice.php";
require_once __DIR__."/Input.php";

use Google\Cloud\Storage\StorageClient;
use Google\Cloud\Firestore\FirestoreClient;

class Tasks
{
    function __construct()
    {
        $config = [
            'keyFile' => json_decode(file_get_contents(__DIR__.'/../../secret/penscomp-ufrn-695c402a62de.json'), true),
            'projectId' => 'penscomp-ufrn'
        ];
        $this->db = new FirestoreClient( $config );
        $this->refCInput = $this->db->collection('input');
        $this->refCChoice = $this->db->collection('choice');
    }


    public function getTasks( string $type )
    {
        if( !isset( $type ) ) throw new Exception($type.' não foi inicializado.');
        switch( $type )
        {
            case "input":

                return $this->getAllInput();
                break;
            case "choice":
                return $this->getAllChoice();
                break;

        }
    }

    //== METODOS DAS TAREFAS INPUT
    /**
     * @brief   Insere uma nova tarefa input no banco de dados.
     * @param Input $input O input a ser inserido.
     * @return  bool true caso a nova tarefa input for inserida, false caso contrario.
     * @throws Exception
     *
     */
    public function setInput( Input $input )
    {
        try {
            // Verifica se algum campo está vazio.
            if ( is_null($input->getTitle()) ||
                is_null($input->getRightAnswer()) ||
                is_null($input->getStatement())
            ) return null;
            $data = [
                'title' => $input->getTitle(),
                'statement' => $input->getStatement(),
                'rightAnswer' => $input->getRightAnswer()
            ];
            $ref = $this->refCInput->add($data);
            return $ref->id();
        } catch ( Exception $e ) {
            throw new Exception( $e->getMessage() );
        }
    }

    /**
     * @brief Obtem uma tarefa input do firebase com o titulo informado.
     * @param string $key Titulo do imput.
     * @return Input Retorna um input com as informações retiradas do firebase, caso o input não exista as informações vão está null.
     * @throws Exception
     */
    public function getInputEqualTo( string $key )
    {
        try{
            $snapshot = $this->refCInput->document($key)->snapshot();
            if($snapshot->exists()){
                $data = $snapshot->data();
                $input = new Input(
                    $snapshot->id(),
                    $data['title'],
                    $data['statement'],
                    $data['rightAnswer']
                );
                return $input;
            }
            return new Input();
        } catch ( Exception $e ){
            throw new Exception($e->getMessage());
        }
    }

    /**
     * @brief Atualizada um nó especifico de um tarefa input no firebase.
     * @param Input $newInput O novo imput, obs.: O titulo não pode ser alterado.
     * @return bool true caso a alteração seja concluida, false caso contrario.
     * @throws Exception
     */
    public function updateInput( Input $newInput )
    {
        try{
            if( is_null( $newInput->getKey() ) ) return false;
            $snapshot = $this->refCInput->document($newInput->getKey())->snapshot();
            if($snapshot->exists()){
                $data = [
                    [ 'path' => 'title', 'value' => $newInput->getTitle() ],
                    [ 'path' => 'statement', 'value' => $newInput->getStatement() ],
                    [ 'path' => 'rightAnswer', 'value' => $newInput->getRightAnswer() ]
                ];
                $this->refCInput->document($newInput->getKey())->update($data);
                return true;
            }
            return false;
        }catch (Exception $e) {
            throw  new Exception( $e->getMessage() );
        }
    }

    /**
     * @brief Remove um nó especifico de uma tarefa input no firebase
     * @param $key Titlo do nó a ser deletado.
     * @return bool True caso o nó seja removido do banco, false caso contrario.
     * @throws Exception
     */
    public function removeInput( $key )
    {
        try{
            $snapshot = $this->refCInput->document( $key )->snapshot();
            if( $snapshot->exists() )
            {
                $this->refCInput->document( $key )->delete();
                return true;
            }
            return false;
        } catch ( Exception $e ){
            throw new Exception( $e->getMessage() );
        }
    }

    /**
     * @brief Retorna todos as tarefas do tipo 'input' que estão armazenadas no firebase.
     * @return array
     * @throws Exception
     */

    private function getAllInput(/*empty*/){
        try{
            $snapshot = $this->refCInput->orderBy('title', 'asc')->documents();
            $data = array();
            $input007 = new Input(
                132123,
                'zezim',
                'statement',
                'rightAnswer'
            );
            array_push($data, $input007);
            foreach ( $snapshot as $task ){
                $input = new Input(
                    $task->id(),
                    $task['title'],
                    $task['statement'],
                    $task['rightAnswer']
                );
                array_push($data, $input);
            }
            return $data;
        }catch (Exception $e) {
            throw new Exception( $e->getMessage() );
        }

    }

    //== METODOS DAS TAREFAS CHOICE

    public function setChoice( Choice $choice ){
        try{
            if(
                is_null( $choice->getTitle() ) ||
                is_null( $choice->getStatement() ) ||
                is_null( $choice->getOptions() ) ||
                is_null( $choice->getRightAnswer() ) ||
                is_null( $choice->getLayout() )
            ) return null;
            $data = [
                'title' => $choice->getTitle(),
                'statement' => $choice->getStatement(),
                'options' => $choice->getOptions(),
                'rightAnswer' => $choice->getRightAnswer(),
                'layout' => $choice->getLayout()
            ];
            $ref = $this->refCChoice->add($data);
            return $ref->id();
        } catch( Exception $e ){
            throw new Exception( $e->getMessage() );

        }
    }
    public function getChoiceEqualTo( string $key ){
        try{
            $snapshot = $this->refCChoice->document( $key )->snapshot();
            if( $snapshot->exists() ){
                $data = $snapshot->data();
                $choice = new Choice(
                    $snapshot->id(),
                    $data['title'],
                    $data['statement'],
                    $data['options'],
                    $data['rightAnswer'],
                    $data['layout']
                );
                return $choice;
            }
            return new Choice();
        } catch( Exception $e ) {
            throw new Exception( $e->getMessage() );
        }
    }
    public function updateChoice( Choice $newChoice ){
        try{
            if(
                is_null( $newChoice->getKey() )||
                is_null( $newChoice->getTitle() ) ||
                is_null( $newChoice->getStatement() ) ||
                is_null( $newChoice->getOptions() ) ||
                is_null( $newChoice->getRightAnswer() ) ||
                is_null( $newChoice->getLayout() )
            ) return false;
            $snapshot = $this->refCChoice->document($newChoice->getKey())->snapshot();
            if( $snapshot->exists() ){
                $data = [
                    [ 'path' => 'title', 'value' => $newChoice->getTitle() ],
                    [ 'path' => 'statement', 'value' => $newChoice->getStatement() ],
                    [ 'path' => 'options', 'value' => $newChoice->getOptions() ],
                    [ 'path' => 'rightAnswer', 'value' => $newChoice->getRightAnswer() ],
                    [ 'path' => 'layout', 'value' => $newChoice->getLayout() ]
                ];
                $this->refCChoice->document($newChoice->getKey())->update( $data );
                return true;
            }
            return false;
        } catch ( Exception $e ) {
            throw new Exception( $e->getMessage() );
        }
    }
    public function removeChoice( $key ){
        try{
            $snapshot = $this->refCChoice->document($key)->snapshot();
            if( $snapshot->exists() ){
                $this->refCChoice->document($key)->delete();
                return true;
            }
            return false;
        } catch( Exception $e ){
            throw new Exception($e->getMessage());
        }
    }
    private function getAllChoice(){
        try{
            $documents = $this->refCChoice->orderBy('title', 'asc')->documents();
            $arr = array();
            foreach ($documents as $document ) {
                if( $document->exists() ){
                    $data = $document->data();
                    $choice = new Choice(
                        $document->id(),
                        $data['title'],
                        $data['statement'],
                        $data['options'],
                        $data['rightAnswer'],
                        $data['layout']
                    );
                    array_push($arr, $choice);
                }
            }
            return $arr;

        } catch (Exception $e) {
            throw new Exception( $e->getMessage() );

        }
    }

    private function auth_cloud_explicit($projectId, $serviceAccountPath)
    {
        $config = [
            'keyFilePath' => $serviceAccountPath,
            'projectId' => $projectId,
        ];
        $storage = new StorageClient($config);
        print $serviceAccountPath.PHP_EOL;
        # Make an authenticated API request (listing storage buckets)
        foreach ($storage->buckets() as $bucket) {
            printf('Bucket: %s' . PHP_EOL, $bucket->name());
        }
    }

    /**
     * @var FirestoreClient
     */
    private $db;
    /**
     * @brief Armazena uma refêrencia a coleção das tarefas 'input'.
     * @var \Google\Cloud\Firestore\CollectionReference
     */
    private $refCInput;
    /**
     * @var \Google\Cloud\Firestore\CollectionReference
     */
    private $refCChoice;
}
