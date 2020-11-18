<?php

require( '../model/Question.php');
require( './controller.php');
require( './interface_controller.php');

class QuestionController extends Controller implements interface_controller{
    private $question;

    public function __construct(){
        parent::__construct("question");
        $this->question = new Question( $this->data );
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

$questionController = new QuestionController();
$questionController->exec();