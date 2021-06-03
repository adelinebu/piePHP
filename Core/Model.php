<?php

namespace Core;


class Model {
    public function __construct($table, $data = []){
        parent::__construct("users", $data);
    }
}