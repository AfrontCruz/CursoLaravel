<?php

require('../model/Model.php');

class Answer extends Model implements \JsonSerializable {
	private $id;
	private $content;
	private $email_user;
	private $created;

	public function __construct($data){
		if( isset( $data->id) )
			$this->id = intval($data->id);
		if( isset( $data->content) )
			$this->content = $data->content;
		if( isset( $data->email_user) )
			$this->email_user = $data->email_user;
		if( isset( $data->created) )
			$this->created = $data->created;
	}
	public function create(){
		$query = "INSERT INTO Answer(id,content,email_user) VALUES($this->id,'$this->content','$this->email_user')";
		return parent::createSQL( $query );
	}
	public function read(){
		$query = "SELECT id,content,email_user,created FROM Answer";
		return parent::readSQL($query, "Answer");
	}
	public function update($data){
		if( "id" == $data->attribute || "created" == $data->attribute)
			return false;
		$query = "UPDATE Answer SET $data->attribute = '$data->value' WHERE id = '$data->id' AND email_user = '$data->email_user' AND created = '$data->created';";
		return parent::updateSQL( $query );
	}
	public function delete($data){
		$query = "DELETE FROM Answer WHERE  id = '$data->id' AND email_user = '$data->email_user' AND created = '$data->created';";
		return parent::deleteSQL($query);
	}
	public function find( $id,$email_user,$created ){
		$query = "SELECT id,content,email_user,created FROM Answer WHERE id = '$id' AND email_user = '$email_user' AND created = '$created';";
		return parent::readSQL($query, "Answer");
	}
	public function rawSelect($sql){
		return parent::readSQL($sql, "Answer");
	}
	public function jsonSerialize(){
		$vars = get_object_vars($this);
		return $vars;
	}
}