<?php

require( '../model/answer.php');
require( './controller.php');
require( './interface_controller.php');

class AnswerController extends Controller implements interface_controller{
    private $answer;

    public function __construct(){
        parent::__construct("answer"); 
        $this->answer = new Answer( $this->data );
    }

    public function exec(){
        $function = $this->method;
        $this->$function();
    }

    public function POST(){
        print_r( $this );
    }
    public function GET(){}
    public function PUT(){}
    public function DELETE(){}
    public function find(){}


}

$answerController = new AnswerController();
$answerController->exec();