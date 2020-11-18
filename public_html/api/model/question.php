<?php

require( '../database/database.php' );
require( '../utils/response.php' );

class Question implements \JsonSerializable{
	private $id;
	private $question;
	private $email_user;
	private $theme;
	private $created;
	private $updated;

	public function __construct( $data ){
        if( isset( $data->id ) )
            $this->id = $data->id;
        if( isset( $data->question ))
            $this->question = $data->question;
        if( isset( $data->email_user ))
            $this->email_user = $data->email_user;
        if( isset( $data->theme ))
            $this->theme = $data->theme;
        if( isset( $data->created ))
            $this->created = $data->created;
        if( isset( $data->updated ))
            $this->updated = $data->updated;
    }
    
     /**
     * @inheritDoc
     */
    public function jsonSerialize(){
        $vars = get_object_vars($this);
        return $vars;
    }
}