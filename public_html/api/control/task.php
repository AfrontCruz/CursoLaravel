<?php

require( '../model/task.php');
require( './controller.php');
require( './interface_controller.php');

class TaskController extends Controller implements interface_controller{
    private $task;

    public function __construct(){
        parent::__construct("task");
        $this->task = new Task( $this->data );
    }

    public function exec(){
        $function = $this->method;
        $this->$function();
    }

    public function POST(){
        print_r( json_encode( $this->data->data ) );
        print_r( json_encode($this->params) );
    }
    public function GET(){}
    public function PUT(){}
    public function DELETE(){}
    public function find(){}


}

$taskController = new TaskController();
$taskController->exec();