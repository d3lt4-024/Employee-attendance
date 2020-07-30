<?php


class create_form extends Controller
{
    private $User;
    private $Manager;
    private $Employee;

    public function __construct()
    {
        $this->User = $this->model("User");
        $this->Manager = $this->model("Manager");
        $this->Employee = $this->model("Employee");
    }

    function index()
    {
        http_response_code(403);
        header('Location: /page-error-403.html');
        exit();
    }

    function manager()
    {
        if (isset($_SESSION["permission"])) {
            if ($_SESSION["permission"] === "admin") {
                $user_info = $this->User->GetInfoUserByID($_SESSION['user_id']);
                $amount_account = $this->User->GetAmountAccount();
                $next_IdAccount = $amount_account + 1;
                $this->ViewWithPer("create-manager-form", "admin", [
                    "next_IdAccount" => $next_IdAccount,
                    "user_info" => $user_info
                ]);
                exit();
            } else if ($_SESSION["permission"] === "manager" || $_SESSION["permission"] === "employee") {
                http_response_code(403);
                header('Location: /page-error-403.html');
                exit();
            } else {
                http_response_code(500);
                header('Location: /page-error-500.html');
                exit();
            }
        } else {
            http_response_code(403);
            header('Location: /page-error-403.html');
            exit();
        }
    }

    function employee()
    {
        if (isset($_SESSION["permission"])) {
            if ($_SESSION["permission"] === "admin") {
                $user_info = $this->User->GetInfoUserByID($_SESSION['user_id']);
                $amount_account = $this->User->GetAmountAccount();
                $next_IdAccount = $amount_account + 1;
                $this->ViewWithPer("create-employee-form", "admin", [
                    "next_IdAccount" => $next_IdAccount,
                    "user_info" => $user_info
                ]);
                exit();
            } else if ($_SESSION["permission"] === "manager" || $_SESSION["permission"] === "employee") {
                http_response_code(403);
                header('Location: /page-error-403.html');
                exit();
            } else {
                http_response_code(500);
                header('Location: /page-error-500.html');
                exit();
            }
        } else {
            http_response_code(403);
            header('Location: /page-error-403.html');
            exit();
        }
    }

    function leave_day()
    {
        if (isset($_SESSION["permission"])) {
            if ($_SESSION["permission"] === "manager") {
                $user_info = $this->Manager->GetManagerWithId($_SESSION['user_id']);
                $amount_lea_form = $this->Manager->GetAmountLeaForm();
                $next_IdForm = $amount_lea_form + 1;
                $this->ViewWithPer("create-leave-day-form", "manager", [
                    "next_IdForm" => $next_IdForm,
                    "user_info" => $user_info
                ]);
                exit();
            } else if ($_SESSION["permission"] === "employee") {
                $user_info = $this->Employee->GetEmployeeWithId($_SESSION['user_id']);
                $amount_lea_form = $this->Employee->GetAmountLeaForm();
                $next_IdForm = $amount_lea_form + 1;
                $this->ViewWithPer("create-leave-day-form", "employee", [
                    "next_IdForm" => $next_IdForm,
                    "user_info" => $user_info
                ]);
                exit();
            } else {
                http_response_code(403);
                header('Location: /page-error-403.html');
                exit();
            }
        } else {
            http_response_code(500);
            header('Location: /page-error-500.html');
            exit();
        }
    }

}