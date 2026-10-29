<?php

namespace core;

use app\classes\Uri;
use app\exceptions\ControllerNotExistException;
class Controller
{
    private $namespace;
    private $controller;
    private $uri;
    private $folders = [
        'app\controllers\portal',
        'app\controllers\admin',
        'app\controllers\blog'
    ];

    public function __construct()
    {
        $this->uri = uri::uri();
    }
    private function ishome()
    {

        return ($this->uri === "/projetoenzo/public/");
    }
    public function load()
    {

        if ($this->ishome()) {

            return $this->controllerHome();
        }
        return $this->controllerNotHome();
    }

    private function controllerNotHome()
    {

        return ($this->uri === "/projetoenzo/public/");
    }
    private function controllerHome()
    {
        if (!$this->controllerExist('Homecontroller')) {
            throw new ControllerNotExistException("A página que você tentou acessar não existe");
        }
        return $this->instantiateController();
    }

    private function controllerExist($controller)
    {
        $controllerexist = false;

        foreach ($this->folders as $folder) {
            if (class_exists($folder . '\\' . $controller)) {
                $controllerexist = true;
                $this->namespace = $folder;
                $this->$controller = $controller;
            }
        }
        return $controllerexist;
    }
    private function instantiateController()
    {
        $controller = $this->namespace . "\\" . $this->controller;
        return new $controller;
    }
}
