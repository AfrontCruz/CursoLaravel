<?php

require( '../model/task.php');
require( './controller.php');
require( './interface_controller.php');

class TaskController extends Controller implements interface_controller{
    private $task;

    public function __construct(){
        parent::__construct("task");
        if( $this->method == "POST" ){
            $this->task = new Task( $this->data );
        }
        else{
            $this->task = new Task( null );
        }
    }

    public function exec(){
        $function = $this->method;
        $this->$function();
        // $this->POST();
    }

    public function POST(){
        print_r( $this );
    }
    public function GET(){}
    public function PUT(){}
    public function DELETE(){}
    public function getModel(){}


}

$taskController = new TaskController();
$taskController->exec();