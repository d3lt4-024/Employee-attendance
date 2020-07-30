<?php

class login extends Controller
{
    private $User;

    public function __construct()
    {
        $this->User = $this->model("User");
    }

    function index()
    {

        if (isset($_POST['login'])) {
            try {
                //checking empty fields
                if (empty($_POST['username'])) {
                    throw new Exception("Username is required!");
                }
                if (empty($_POST['password'])) {
                    throw new Exception("Password is required!");
                }
                //delete space and special char in form data
                $username = trim($_POST['username']);
                $password = hash('sha256', trim($_POST['password']));
                $result = $this->User->LoginCheck($username, $password); //check if user is login
                if ($result === false) {
                    throw new Exception("Username or Password is wrong, try again!"); //error messenge
                    header('location: /login');
                } else {
                    $role = strtolower($result["Role"]);
                    switch ($role) {
                        case "manager":
                            session_regenerate_id(); //regenerate session
                            $_SESSION['user_id'] = $result['IdAccount']; //save id to session
                            $_SESSION['permission'] = "manager"; //set permission to user and save to session
                            $this->User->ChangeState($result['IdAccount'], "online");
                            header('location: /home');
                            exit();
                            break;
                        case "employee":
                            session_regenerate_id(); //regenerate session
                            $_SESSION['user_id'] = $result['IdAccount']; //save id to session
                            $_SESSION['permission'] = "employee"; //set permission to user and save to session
                            $this->User->ChangeState($result['IdAccount'], "online");
                            header('location: /home');
                            exit();
                            break;
                        case "admin":
                            session_regenerate_id(); //regenerate session
                            $_SESSION['user_id'] = $result['IdAccount']; //save id to session
                            $_SESSION['permission'] = "admin"; //set permission to user and save to session
                            $this->User->ChangeState($result['IdAccount'], "online");
                            header('location: /home');
                            exit();
                            break;
                        default:
                            throw new Exception("Something went wrong, try again!"); //error messenge
                            header('location: /login');
                            break;
                    }
                }
            } //end of try block
            catch (Exception $e) {
                $error_msg = $e->getMessage();
            }
        }
        $this->ViewWithoutPer("page-login", [
            "error_msg" => $error_msg
        ]);
    }

}