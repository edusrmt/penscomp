<?php


class Input
{
    public function __construct( $_key = null , $_title = null, $_statement = null, $_rightAnswer = null)
    {
        $this->key = $_key;
        $this->title = $_title;
        $this->statement = $_statement;
        $this->rightAnswer = $_rightAnswer;
    }

    //== GETTERS e SETTERS
    public function getKey( /*empty*/ ) { return $this->key; }
    public function getTitle( /*empty*/ ) { return $this->title; }
    public function getStatement( /*empty*/ ) { return $this->statement; }
    public function getRightAnswer( /*empty*/ ) { return $this->rightAnswer; }

    public function setKey( $_key ) { $this->key = $_key; }
    public function setTitle( $_title ) { $this->title = $_title; }
    public function setStatement( $_statement ) { $this->statement = $_statement; }
    public function setRightAnswer( $_rightAnswer ) {  $this->rightAnswer = $_rightAnswer; }

    //== ATRIBUTOS
    private $key;
    private $title;
    private $statement;
    private $rightAnswer;

}