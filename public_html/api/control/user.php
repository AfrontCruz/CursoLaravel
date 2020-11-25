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
        if( count( $this->params ) > 0 ){
            $func = $this->params[0];
            $this->$func( $this->params[1] );
        }
        else
            print_r( json_encode( $this->user->read() ) );
    }
    public function PUT(){
        print_r( json_encode( $this->user->update( $this->data ) ) );
    }
    public function DELETE(){
        print_r( json_encode( $this->user->delete( $this->data->key )) );
    }

    public function find($key){
        print_r( json_encode( $this->user->find($key) ) );
    }


}

$userController = new UserController();
$userController->exec();