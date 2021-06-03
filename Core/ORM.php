<?php

namespace Core;

use \Core\Database;
use \Core\Request;

class ORM extends Database {

    private $pdo;

    public function __construct(){
        $pdo = new Database();
        $this->pdo = $pdo->getPdo();
        
    }

    public function create($table, $fields){
        $field = '`' . implode('`,`', array_keys($fields)) . '`';
        $values = "'" . implode("','", $fields) . "'";
        $stt = $this->pdo->prepare("INSERT INTO $table ($field) VALUES ($values)");
        $stt->execute();

        $last_id = $this->pdo->lastInsertId();
        return $last_id;

    }

    public function read($table, $id){
        $sql = "SELECT * FROM `$table` WHERE id=:id";
        $res = $this->pdo->prepare($sql);
        $res->bindParam('id', $id);
        $res->execute();
        $result = $res->fetchAll();
        
        return $result; 
    }

    public function update($table, $id, $fields){
        
        foreach ($fields as $key => $value){
            $valeur = "$key = '$value',";
            $val = rtrim($valeur, ",");
            $update = $this->pdo->prepare("UPDATE $table SET $val WHERE id = $id");
            $update->execute();
        }

        return true;
    }

    public function delete($table, $id){
        $sql = "DELETE FROM `$table` WHERE id=:id";
        $res = $this->pdo->prepare($sql);
        $res->bindParam('id', $id);
        $res->execute();
    
        return true;
    }

    public function find($table, $params = array(
        'WHERE' => '',
        'ORDER BY' => '',
        'LIMIT' => ''
    )) {
        foreach ($params as $key => $value){
            $_params = $key . ' ' . $value . ' ';
        }
        $find = $this->pdo->prepare("SELECT * FROM $table $_params");
        $find->execute();
        $result = $find->fetchAll();
        
        return $result;
    }
}
