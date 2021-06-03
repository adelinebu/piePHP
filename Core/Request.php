<?php

namespace Core;

class Request {
    private $get;
    private $post;

    public function __construct(){

        $this->setGetParams();
        $this->setPostParams();

    }

    public function setGetParams(){
        foreach ($_GET as $k => $v){
            $req = stripcslashes(trim(htmlspecialchars($v)));
            $this->get = $req;

        }
    }

    public function GetParams(){
        return $this->get;
    }

    public function setPostParams(){
        foreach ($_POST as $k => $v){
            $req[$k] = stripcslashes(trim(htmlspecialchars($v)));
            $this->post = $req;

        }
    }

    public function PostParams(){
        return $this->post;
    }
}