<?php

require( '../database/database.php' );
require( '../utils/response.php' );

class User implements \JsonSerializable{
    
     /**
     * @inheritDoc
     */
    public function jsonSerialize(){
        $vars = get_object_vars($this);
        return $vars;
    }
}