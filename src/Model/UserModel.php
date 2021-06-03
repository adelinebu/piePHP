<?php

namespace Model;

use \Core\Database;
use \Core\Model;

class UserModel extends Model {
    
    private $email;
    private $password;
    private $pdo;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
        $connexion = new Database();
        $this->pdo=$connexion->getPDO();
    
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function login(){
        $sql = "SELECT * FROM users WHERE email =:email AND password = :password";
        $res = $this->pdo->prepare($sql);
        $res->bindParam(':email', $email);
        $res->bindParam(':password', $this->password);
        $res->execute();
        $connexion = $res->fetchAll();
    }

    public function save(){
        $sql = "INSERT INTO users (email, password) VALUES (:mail, :password)";
        $res = $this->pdo->prepare($sql);
        $res->bindParam(':mail', $this->email);
        $res->bindParam(':password', $this->password);
        $res->execute();
    }

    public function create(){
        $sql = "INSERT INTO users (email, password) VALUES (:mail, :password)";
        $res = $this->pdo->prepare($sql);
        $res->bindParam(':mail', $this->email);
        $res->bindParam(':password', $this->password);
        $res->execute();
        $id_user = $this->pdo->lastInsertId();
        return $id_user;
    }

    public function read($id) {
        $sql = "SELECT * FROM users WHERE id=:id";
        $res = $this->pdo->prepare($sql);
        $res->bindParam('id', $id);
        $res->execute();
        $result = $res->fetchAll();
    }

    public function update($id, $name_column, $new_value) {
        $sql = "UPDATE users SET $name_column=:val WHERE id=:id";
        $res_update = $this->pdo->prepare($sql);
        $res_update->bindParam(':val', $new_value);
        $res_update->bindParam('id', $id);
        $res_update->execute();

    }

    public function delete($id) {
        $sql = "DELETE FROM users WHERE id=:id";
        $res = $this->pdo->prepare($sql);
        $res->bindParam('id', $id);
        $res->execute();
    }

    public function read_all($id) {
        $sql = "SELECT * FROM users WHERE id=:id";
        $result_id = $this->bdd->prepare($sql);
        $res->bindParam('id', $id);
        $res->execute();
        $result = $res->fetchAll();
    }
    
}