<?php

require( '../model/user.php');
require( './controller.php');
require( './interface_controller.php');

class UserController extends Controller implements interface_controller{
    private $user;

    public function __construct(){
        parent::__construct("user"); 
        $this->user = new User( $this->data->user );
    }

    public function exec(){
        $function = $this->method;
        $this->$function(); 
    }

    public function POST(){
        print_r( json_encode( $this->user->create() ) );
    }
    public function GET(){
        print_r( json_encode( $this->user->read() ) );
    }
    public function PUT(){}
    public function DELETE(){}
    public function find(){}


}

$userController = new UserController();
$userController->exec();