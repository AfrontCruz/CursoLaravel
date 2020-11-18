<?php

class response implements \JsonSerializable{
    private $data;
    private $isSuccess;
    private $msg;

    /**
     * Respuesta constructor.
     * @param $data
     * @param $isSuccess
     * @param $msg
     */
    public function __construct($data, $isSuccess, $msg){
        $this->data = $data;
        $this->isSuccess = $isSuccess;
        $this->msg = $msg;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getIsSuccess()
    {
        return $this->isSuccess;
    }

    /**
     * @param mixed $isSuccess
     */
    public function setIsSuccess($isSuccess)
    {
        $this->isSuccess = $isSuccess;
    }

    /**
     * @return mixed
     */
    public function getMsg()
    {
        return $this->msg;
    }

    /**
     * @param mixed $msg
     */
    public function setMsg($msg)
    {
        $this->msg = $msg;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(){
        $vars = get_object_vars($this);
        return $vars;
    }
}