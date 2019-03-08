<?php

namespace App;

class App
{

    private $db_instance;
    private static $_instance;

    public static function getInstance(){
        if(is_null(self::$_instance)){
            self::$_instance = new App();
        }
        return self::$_instance;
    }

    public static function load(){
        session_start();
        require __DIR__ . '/Autoloader.php';
        Autoloader::register();
    }

    public function getDb(){
        require __DIR__ . '/../configuration.php';

        if(null === $this->db_instance){
            $this->db_instance = new Repository($database['host'],$database['base'],$database['user'],$database['password']);
        }
        return $this->db_instance;
    }

}