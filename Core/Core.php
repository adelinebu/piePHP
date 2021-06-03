<?php

namespace Core;

class Core 
{
    public function run()
    {
        //$this->RouteurStatic();
        $this->RouteurDynamic();
    }
    
    private function Load($controller, $action, $id){
        $controller = "Controller\\" . ucfirst($controller) . "Controller";
        $action = $action . "Action";
        $app = new $controller();
        $app->$action($id);
    }


    private function RouteurStatic (){
        $url = str_replace(BASE_URI, '', $_SERVER['REQUEST_URI']);
        $res_url = Router::getStatic($url);
        $this->Load($res_url["controller"], $res_url["action"]);
       
    }
    
        
    private function RouteurDynamic(){

        $url = str_replace(BASE_URI, '', $_SERVER['REQUEST_URI']);
        $dynamicURL = explode('/', $url);
            
        $action = $dynamicURL[2] ?? '';
        $controller_name = ucfirst($dynamicURL[1]);
        $id = $dynamicURL[3] ?? '';
        
        if (!file_exists('./src/Controller/' . $controller_name . 'Controller.php')){
            $controller_name = "App";
        } else {
            $controller_name = ucfirst($dynamicURL[1]);
        }

        if (!isset($action) || empty($action)){
            $action = "Index";
        } else {
            $action = ucfirst($dynamicURL[2]);
        }
       
        $this->Load($controller_name, $action, $id);

    }    
}