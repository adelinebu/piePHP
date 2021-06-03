<?php

namespace Core;

class Database {
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $charset;
    private $pdo;


    public function __construct(){
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "piephp";
        $this->charset = "utf8mb4";

        try {
        $dsn = "mysql:host=".$this->servername.";dbname=".$this->dbname.";charset=".$this->charset;
        $pdo = new \PDO($dsn, $this->username, $this->password);
        $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $this->pdo = $pdo; 
        } catch (PDOException $e) {
            echo "Connexion échouée: ".$e->getMessage();
        }
    }

    public function getPdo(){
        return $this->pdo;
    }
}