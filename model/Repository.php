<?php

require_once __DIR__.'/../configuration.php';

class Repository
{
    public static function connect()
    {
        $database = [
            'host' => 'localhost',
            'base' => 'tp',
            'user' => 'tp',
            'password' => 'secret'
        ];
        $pdo = new PDO("mysql:host=".$database['host'].";dbname=".$database['base'],$database['user'],$database['password']);
        return new self($pdo);
    }

    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
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