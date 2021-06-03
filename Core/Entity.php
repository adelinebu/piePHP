<?php

namespace Core;

use \Core\ORM;

class Entity {

    public $table;
    public $fields;
    public $orm;

    public function __construct($params = []){
        foreach ($params as $key => $value) {
            $this->{$key} = $value;
        }

        $this->orm = new ORM();
        $this->fields = $params;
    }

    public function read(){
        return $this->orm->read($this->table, $this->id);
    }

    public function save(){
        return $this->orm->create($this->table, $this->fields);
    }
}