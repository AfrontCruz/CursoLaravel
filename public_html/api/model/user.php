<?php

require( '../database/database.php' );
require( '../utils/response.php' );

class User implements \JsonSerializable{
	private $email;
	private $username;
	private $type;
	private $password;
	private $created;
	private $updated;

	public function __construct( $data ){
        if( isset( $data->email ) )
            $this->email = $data->email;
        if( isset( $data->username ))
            $this->username = $data->username;
        if( isset( $data->type ))
            $this->type = $data->type;
        if( isset( $data->password ))
            $this->password = $data->password;
        if( isset( $data->created ))
            $this->created = $data->created;
        if( isset( $data->updated ))
            $this->updated = $data->updated;
    }

    public function create(){
        $query = "CALL sp_insert_user( '$this->email', '$this->username', '$this->password')";
        $db = new database();
        $db->getConn();
        $store = $db->create( $query );
        $response = new response(null, $store, null);
        return $response;
    }

    public function read(){
        $query = "SELECT email, username, type, created, updated FROM User";
        $db = new database();
        $db->getConn();
        $array_user = Array();
        $result = $db->read( $query );
        foreach( $result as $item ){
            $user = new User( $item );
            array_push( $array_user, $user );
        }
        $response = new response( $array_user, true, null );
        return $response;
    }

    public function find($key){
        $query = "SELECT email, username, type, created, updated FROM User 
        WHERE email = '$key' OR username = '$key';";
        $db = new database();
        $db->getConn();
        $array_user = Array();
        $result = $db->read( $query );
        foreach( $result as $item ){
            $user = new User( $item );
            array_push( $array_user, $user );
        }
        $response = new response( $array_user, true, null );
        return $response;
    }

    public function update($data){
        if( $data->attrib == 'password' ){
            return new response(null, false, "No se puede actualizar la contraseña" );
        }
        $query = "UPDATE User SET $data->attrib = '$data->value' WHERE email = '$data->key' 
        OR username = '$data->key';";
        $db = new database();
        $db->getConn();
        $result = $db->update( $query ); // True or False
        if( $response )
            $response = new response( null, $result, "Se actualizó $data->attrib" );
        else
            $response = new response( null, $result, null );
        return $response;
    }

    public function delete($key){
        $query = "DELETE FROM User
        WHERE email = '$key' OR username = '$key';";
        $db = new database();
        $db->getConn();
        $result = $db->delete( $query ); // True or False
        if( $result )
            $response = new response( null, $result, "Se elimino $key" );
        else 
            $response = new response( null, $result, null );
        return $response;
    }
    
     /**
     * @inheritDoc
     */
    public function jsonSerialize(){
        $vars = get_object_vars($this);
        return $vars;
    }
}