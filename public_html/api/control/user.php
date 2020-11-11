<?php

require( '../model/user.php');
require( './controller.php');
require( './interface_controller.php');

class UserController extends Controller implements interface_controller{
    private $User;

    public function __construct(){
        parent::__construct("user"); 
        $this->user = new User( $this->data );
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

$userController = new UserController();
$userController->exec();