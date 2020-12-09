<?php

require('./Controller.php');
require('./InterfaceController.php');
require('../model/answer.php');

class AnswerController extends Controller implements InterfaceController{
	private $answer;

	public function __construct(){
		parent::__construct("answer");
		$this->answer = new Answer( $this->data->answer );
	}
	public function exec(){
		$function = $this->method;
		$this->$function();
	}
	public function POST(){
		if( $this->params == null)
			print_r( json_encode( $this->answer->create() ) );
		else{
			$function = $this->params[0];
			$this->$function();
		}
	}
	public function GET(){
		if( $this->params == null)
			print_r( json_encode( $this->answer->read() ) );
		else{
			$function = $this->params[0];
			$this->$function();
		}
	}
	public function PUT(){
		print_r( json_encode( $this->answer->update($this->data) ) );
	}
	public function DELETE(){
		print_r( json_encode( $this->answer->delete($this->data) ) );
	}
	public function OPTIONS(){ }

	public function find(){
		print_r( json_encode( $this->answer->find( $this->params[1],$this->params[2],$this->params[3] ) ) );
	}
	public function test(){
		echo "Test Answer";
	}
}

$answerController = new AnswerController();
$answerController->exec();