<?php

namespace Controller;

use \Core\Controller;
use \Model\UserModel;
use \Core\Request;

class UserController extends Controller {
    public $req;

    public function __construct(){
        $this->req = new Request();
    }

    public function indexAction(){
        echo __CLASS__ . " [indexAction]" . PHP_EOL;
    }

    public function addAction(){
        echo __CLASS__ . " [addAction]" . PHP_EOL;
    }

    public function registerAction(){
        $post = $this->req->PostParams();

        if (isset($post['email']) && isset($post['password'])){
            $save = new UserModel($post['email'], $post['password']);
            $save->save();
        } else {
            $this->render("register");
        }
    }

    public function loginAction($id) {
        $post = $this->req->PostParams();

        if (isset($post['email']) && isset($post['password'])){
            $save = new UserModel($post['email'], $post['password']);
            $save->login();
        } else {
            $this->render("login", ["hello" => $id]);
        }
        
    }
    
}