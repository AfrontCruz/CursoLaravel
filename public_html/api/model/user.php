<?php

require('../model/Model.php');

class User extends Model implements \JsonSerializable {
	private $email;
	private $username;
	private $type;
	private $password;

	public function __construct($data){
		if( isset( $data->email) )
			$this->email = $data->email;
		if( isset( $data->username) )
			$this->username = $data->username;
		if( isset( $data->type) )
			$this->type = $data->type;
		if( isset( $data->password) )
			$this->password = $data->password;
	}
	public function create(){
		$query = "CALL sp_insert_user('$this->email','$this->username','$this->password')";
		return parent::createSQL( $query );
	}
	public function read(){
		$query = "SELECT email,username,type FROM User";
		return parent::readSQL($query, "User");
	}
	public function update($data){
		$query = "UPDATE User SET $data->attribute = '$data->value' WHERE email = '$data->email';";
		return parent::updateSQL( $query );
	}
	public function delete($data){
		$query = "DELETE FROM User WHERE  email = '$data->email';";
		return parent::deleteSQL($query);
	}
	public function find( $email ){
		$query = "SELECT email,username,type FROM User WHERE email = '$email' OR username = '$email';";
		return parent::readSQL($query, "User");
	}
	public function rawSelect($sql){
		return parent::readSQL($sql, "User");
	}
	public function jsonSerialize(){
		$vars = get_object_vars($this);
		return $vars;
	}
}