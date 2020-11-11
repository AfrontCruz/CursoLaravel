<?php

require( '../database/database.php' );
require( '../utils/response.php' );

class Answer implements \JsonSerializable{
    private $id;
    
     /**
     * @inheritDoc
     */
    public function jsonSerialize(){
        $vars = get_object_vars($this);
        return $vars;
    }
}