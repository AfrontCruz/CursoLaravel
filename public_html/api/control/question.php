<?php

require('./Controller.php');
require('./InterfaceController.php');
require('../model/question.php');

class QuestionController extends Controller implements InterfaceController{
	private $question;

	public function __construct(){
		parent::__construct("question");
		$this->question = new Question( $this->data->question );
	}
	public function exec(){
		$function = $this->method;
		$this->$function();
	}
	public function POST(){
		if( $this->params == null)
			print_r( json_encode( $this->question->create() ) );
		else{
			$function = $this->params[0];
			$this->$function();
		}
	}
	public function GET(){
		if( $this->params == null)
			print_r( json_encode( $this->question->read() ) );
		else{
			$function = $this->params[0];
			$this->$function();
		}
	}
	public function PUT(){
		print_r( json_encode( $this->question->update($this->data) ) );
	}
	public function DELETE(){
		print_r( json_encode( $this->question->delete($this->data) ) );
	}
	public function OPTIONS(){ }

	public function find(){
		print_r( json_encode( $this->question->find( $this->params[1] ) ) );
	}
	public function test(){
		echo "Test Question";
	}
}

$questionController = new QuestionController();
$questionController->exec();