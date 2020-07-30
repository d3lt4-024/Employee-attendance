<?php

class Controller
{
    public function model($model)
    {
        require_once("./mvc/models/" . $model . ".php");
        return new $model;
    }

    public function ViewWithoutPer($view, $data = [])
    {
        require_once("./mvc/views/" . $view . ".php");
    }

    public function ViewWithPer($view, $permission, $data = [])
    {
        require_once("./mvc/views/" . $permission . "/" . $view . ".php");
    }
}

?>