<?php


namespace Application\models;


class Choice
{
    public function __construct( $_key = null , $_title = null, $_statement = null, array $_options = null, $_rightAnswer = null, $_layout = null )
    {
        $this->key = $_key;
        $this->title = $_title;
        $this->statement = $_statement;
        $this->options = $_options;
        $this->rightAnswer = $_rightAnswer;
        $this->layout = $_layout;
    }

    public function getKey( /*empty*/ ) { return $this->key; }
    public function getTitle() { return $this->title; }
    public function getStatement() { return $this->statement; }
    public function getOptions() { return $this->options; }
    public function getRightAnswer() { return $this->rightAnswer; }
    public function getLayout() { return $this->layout; }

    public function setKey( $_key ) { $this->key = $_key; }
    public function setTitle( $title ) { $this->title = $title; }
    public function setStatement( $statement ) { $this->statement = $statement; }
    public function setOptions( $options ) { $this->options = $options; }
    public function setRightAnswer( $rightAnswer ) { $this->rightAnswer = $rightAnswer; }
    public function setLayout( $layout ) { $this->layout = $layout; }

    private $key;
    private $title;
    private $statement;
    private $options;
    private $rightAnswer;
    private $layout;
}