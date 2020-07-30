<?php

class App
{
    //example url: http://localhost:1245/list/teacher/1
    protected $controller = "home"; //controller: list
    protected $action = "index"; //teacher: teacher
    protected $param = []; //param: 1

    function __construct()
    {
        if (isset($_SESSION["user_id"])) {
            $arr = $this->UrlProcess();
            //process controller
            if (file_exists("./mvc/controllers/" . $arr[0] . ".php") === true) {
                $this->controller = $arr[0];
                unset($arr[0]);
            }
            require_once "./mvc/controllers/" . $this->controller . ".php";
            $this->controller = new $this->controller;
            //process action
            if (isset($arr[1])) {
                if (method_exists($this->controller, $arr[1])) {
                    $this->action = $arr[1];
                }
                unset($arr[1]);
            }
            //process param
            $this->param = $arr ? array_values($arr) : [];
            call_user_func_array([$this->controller, $this->action], $this->param);
        } else {
            $this->controller = "login";
            require_once "./mvc/controllers/" . $this->controller . ".php";
            $this->controller = new $this->controller;
            call_user_func_array([$this->controller, $this->action], $this->param);
        }
    }

    private function UrlProcess()
    {
        if (isset($_GET["url"])) {
            $arr = explode("/", filter_var(trim($_GET["url"], "/")));
            return $arr;
        }
    }
}
