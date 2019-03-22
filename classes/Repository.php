<?php

class Repository
{

    protected $pdo;

    public function __construct($host, $name, $user, $pass){
        $this->host = $host;
        $this->name = $name;
        $this->user = $user;
        $this->pass = $pass;
        $this->getPDO();
    }

    private function getPDO(){
        if($this->pdo === null){
            $pdo = new PDO('mysql:dbname=' . $this->name . ';host=' . $this->host, $this->user, $this->pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }

    public function query($query)
    {
        return $this->pdo->query($query);
    }


    public function fetch($query, $parameter)
    {
        return $this->prepare($query, $parameter)->fetch();
    }

    public function fetchAllWithParameter($query, $parameter)
    {
        return $this->prepare($query, $parameter)->fetchAll();

    }
    public function fetchAll($query)
    {
        return $this->query($query)->fetchAll();
    }

    public function prepare($query, $parameter = null)
    {
        $response =  $this->pdo->prepare($query);
        if (null !== $parameter) {
            $response->execute($parameter);
        }
        return $response;

    }
}