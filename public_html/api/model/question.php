<?php

require('../model/Model.php');

class Question extends Model implements \JsonSerializable {
	private $id;
	private $question;
	private $email_user;
	private $theme;

	public function __construct($data){
		if( isset( $data->id) )
			$this->id = intval($data->id);
		if( isset( $data->question) )
			$this->question = $data->question;
		if( isset( $data->email_user) )
			$this->email_user = $data->email_user;
		if( isset( $data->theme) )
			$this->theme = $data->theme;
	}
	public function create(){
		$query = "INSERT INTO Question(question,email_user,theme) VALUES('$this->question','$this->email_user','$this->theme')";
		return parent::createSQL( $query );
	}
	public function read(){
		$query = "SELECT id,question,email_user,theme FROM Question";
		return parent::readSQL($query, "Question");
	}
	public function update($data){
		if( "id" == $data->attribute)
			return false;
		$query = "UPDATE Question SET $data->attribute = '$data->value' WHERE id = '$data->id';";
		return parent::updateSQL( $query );
	}
	public function delete($data){
		$query = "DELETE FROM Question WHERE  id = '$data->id';";
		return parent::deleteSQL($query);
	}
	public function find( $id ){
		$query = "SELECT id,question,email_user,theme FROM Question WHERE id = '$id';";
		return parent::readSQL($query, "Question");
	}
	public function rawSelect($sql){
		return parent::readSQL($sql, "Question");
	}
	public function jsonSerialize(){
		$vars = get_object_vars($this);
		return $vars;
	}
}