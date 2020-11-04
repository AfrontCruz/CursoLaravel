<?php

class database
{
    public $user;
    public $password;
    public $server;
    public $nameDB;

    public $conn;

    public function __construct()
    {
        $database_info = json_decode( file_get_contents("../config.json") );
        $this->user = $database_info->database->user;
        $this->password = $database_info->database->password;
        $this->server = $database_info->database->server;
        $this->nameDB = $database_info->database->nameDB;
    }

    public function getConn()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->server
                . ";dbname=" . $this->nameDB
                , $this->user, $this->password);
            $this->conn->exec("set names uft8");
            return $this->conn;
        } catch (PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }
    }

    public function create($sql)
    {
        $this->conn->query('SET CHARACTER SET utf8');
        $consulta = $this->conn->prepare($sql);
        $count = $this->conn->exec($sql);
        return $count > 0 ?  true :  false;
    }

    public function read($sql)
    {
        $this->conn->query('SET CHARACTER SET utf8');
        $consulta = $this->conn->query($sql);
        $error = $this->conn->errorInfo();
        if( $error[0] == 0 ){
            $resultado = $consulta->fetchAll(PDO::FETCH_OBJ);
        }        
        else if( $error[0] == 23000 ){
            $resultado = [null, "Registro duplicado"];
        }
        else{
            $resultado = [null, $error[2]];
        }

        return $resultado;
    }

    public function update($sql){
        $this->conn->query('SET CHARACTER SET utf8');
        $count = $this->conn->exec($sql);
        return $count > 0 ?  true :  false;
    }

    public function delete($sql){
        $this->conn->query('SET CHARACTER SET utf8');
        $count = $this->conn->exec($sql);
        return $count > 0 ?  true :  false;
    }
}
?>