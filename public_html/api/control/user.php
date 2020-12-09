<?php

require('./Controller.php');
require('./InterfaceController.php');
require('../model/user.php');

class UserController extends Controller implements InterfaceController{
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
		if( $this->params == null)
			print_r( json_encode( $this->user->create() ) );
		else{
			$function = $this->params[0];
			$this->$function();
		}
	}
	public function GET(){
		if( $this->params == null)
			print_r( json_encode( $this->user->read() ) );
		else{
			$function = $this->params[0];
			$this->$function();
		}
	}
	public function PUT(){
		print_r( json_encode( $this->user->update($this->data) ) );
	}
	public function DELETE(){
		print_r( json_encode( $this->user->delete($this->data) ) );
	}
	public function OPTIONS(){ }

	public function find(){
		print_r( json_encode( $this->user->find( $this->params[1] ) ) );
	}
	public function test(){
		echo "Test User";
	}
}

$userController = new UserController();
$userController->exec();