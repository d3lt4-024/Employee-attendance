<?php

class logout extends Controller
{
    private $User;

    public function __construct()
    {
        $this->User = $this->model("User");
    }

    function index()
    {
        $this->User->ChangeState($_SESSION['user_id'], "offline");
        session_destroy();
        header('location: /');
    }
}
