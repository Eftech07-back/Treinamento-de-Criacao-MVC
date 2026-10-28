<?php

namespace core;

use app\classes\uri;

class Controller
{
private $namespace;
private $controller;
    private $uri;
    private $folders= [
        'app\controllers\portal',
        'app\controllers\admin', 
        'app\controllers\blog'
    ];

    public function __construct()
    {
        $this->uri = uri::uri();
    }

    public function load()
    {

        if ($this->ishome()) {

            return $this->controllerHome();
        }
        return $this->controllerNotHome();
    }
    private function ishome()
    {

        return ($this->uri === "/");
    }
    private function controllerNotHome()
    {

        return ($this->uri === "/");
    }
    private function controllerHome()
    {
        if (!$this->controllerExist('Homecontroller')){
            throw new ControllerNotExistException("Esse controller não existe");
        }
        return$this->instantiateController();
    }

private function controllerExist($controller){
$controllerexist = false;

foreach ($this->folders as $folder) {
    if(class_exists($folder.'\\'.$controller)){
        $controllerexist = true;
        $this -> namespace = $folder;
        $this -> $controller = $controller;    
        }

}
return $controllerexist;
}
private function instantiateController(){
    
}





















































    }
