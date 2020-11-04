<?php

require( '../database/database.php' );
require( '../utils/response.php' );

class Task implements \JsonSerializable{
    private $id;
	private $name;
    private $init;
    private $finish;
    private $statusTask;
    private $created;
    private $updated;

    public function __construct( $data ){
        if( isset( $data->id ) )
            $this->id = $data->id;
        if( isset( $data->name ))
            $this->name = $data->name;
        if( isset( $data->init ))
            $this->init = $data->init;
        if( isset( $data->finish ) )
            $this->finish = $data->finish;
        if( isset( $data->statusTask ) )
            $this->statusTask = $data->statusTask;
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