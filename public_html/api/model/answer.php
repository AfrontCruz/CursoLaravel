<?php

require( '../database/database.php' );
require( '../utils/response.php' );

class Answer implements \JsonSerializable{
    private $id;
    private $content;
    private $email_user;
    private $created;
    private $updated;

    public function __construct( $data ){
        if( isset( $data->id ) )
            $this->id = $data->id;
        if( isset( $data->content ))
            $this->content = $data->content;
        if( isset( $data->email_user ))
            $this->email_user = $data->email_user;
        if( isset( $data->created ))
            $this->created = $data->created;
        if( isset( $data->updated ))
            $this->updated = $data->updated;
    }

    public function create(){
        $query = "INSERT INTO Answer ...";
    }
    
     /**
     * @inheritDoc
     */
    public function jsonSerialize(){
        $vars = get_object_vars($this);
        return $vars;
    }
}