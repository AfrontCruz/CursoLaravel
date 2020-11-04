<?php
require( '../utils/url.php');

header('Content-Type: application/json');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With, Authorization");

class Controller{
    public $data;
    public $method;
    public $params;

    public function __construct($name){
        $this->data = json_decode( file_get_contents('php://input') );
        $this->method = $_SERVER['REQUEST_METHOD'];
        $url = new url( $_SERVER['REQUEST_URI'], $name );
        $this->params = $url->getparams();
    }

    public function exec(){
        print_r( $this );
    }

    public function getdata(){
        return $this->data;
    }

    public function getmethod(){
        return $this->method;
    }

    public function getparams(){
        return $this->params;
    }
}
?>
