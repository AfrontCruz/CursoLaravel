<?php

class Response implements \JsonSerializable{
    private $data;
    private $isSuccess;
    private $messagge;

    /**
     * Respuesta constructor.
     * @param $data
     * @param $isSuccess
     * @param $messagge
     */
    public function __construct($data, $isSuccess, $messagge){
        $this->data = $data;
        $this->isSuccess = $isSuccess;
        $this->messagge = $messagge;
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
    public function getMessagge()
    {
        return $this->messagge;
    }

    /**
     * @param mixed $messagge
     */
    public function setMessagge($messagge)
    {
        $this->messagge = $messagge;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(){
        $vars = get_object_vars($this);
        return $vars;
    }
}