<?php

class listed extends Controller
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
        if (isset($_SESSION['permission'])) {
            if ($_SESSION['permission'] === "admin") {
                $user_info = $this->User->GetInfoUserByID($_SESSION['user_id']);
                $result = $this->Manager->GetAllManager();
                $this->ViewWithPer("manager-list", "admin", [
                    "manager_list" => $result,
                    "user_info" => $user_info
                ]); //if user is teacher
                exit();
            } else if ($_SESSION['permission'] === "manager" || $_SESSION['permission'] === "employee") {
                http_response_code(403);
                header('Location: /page-error-403.html');
                exit();
            } else {
                http_response_code(403);
                header('Location: /page-error-403.html');
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
        if (isset($_SESSION['permission'])) {
            if ($_SESSION['permission'] === "admin") {
                $user_info = $this->User->GetInfoUserByID($_SESSION['user_id']);
                $result = $this->Employee->GetAllEmployee();
                $this->ViewWithPer("employee-list", "admin", [
                    "employee_list" => $result,
                    "user_info" => $user_info
                ]); //if user is teacher
                exit();
            } else if ($_SESSION['permission'] === "manager" || $_SESSION['permission'] === "employee") {
                http_response_code(403);
                header('Location: /page-error-403.html');
                exit();
            } else {
                http_response_code(403);
                header('Location: /page-error-403.html');
                exit();
            }
        } else {
            http_response_code(403);
            header('Location: /page-error-403.html');
            exit();
        }
    }

    function my_leave_form($IdAccount)
    {
        if ($IdAccount === $_SESSION["user_id"]) {
            if (isset($_SESSION["permission"])) {
                if ($_SESSION["permission"] === "manager") {
                    $user_info = $this->Manager->GetManagerWithId($_SESSION['user_id']);
                    $result = $this->Manager->GetLeaDayForm($IdAccount);
                    $this->ViewWithPer("my-leave-form-list", "manager", [
                        "user_info" => $user_info,
                        "lea_form_list" => $result
                    ]);
                    exit();
                } else if ($_SESSION["permission"] === "employee") {
                    $user_info = $this->Employee->GetEmployeeWithId($_SESSION['user_id']);
                    $result = $this->Employee->GetLeaDayForm($IdAccount);
                    $this->ViewWithPer("my-leave-form-list", "employee", [
                        "user_info" => $user_info,
                        "lea_form_list" => $result
                    ]);
                    exit();
                } else {
                    http_response_code(403);
                    header('Location: /page-error-403.html');
                    exit();
                }
            } else {
                http_response_code(403);
                header('Location: /page-error-403.html');
                exit();
            }
        } else {
            http_response_code(403);
            header('Location: /page-error-403.html');
            exit();
        }

    }

    function department_leave_form($Department_Number)
    {
        if ($this->User->CheckValidDept($Department_Number) === true) {
            if (isset($_SESSION["permission"])) {
                if ($_SESSION["permission"] === "admin") {
                    $user_info = $this->User->GetInfoUserByID($_SESSION["user_id"]);
                    $result = $this->User->GetListFormDepartment($Department_Number);
                    $this->ViewWithPer("department-leave-form-list", "admin", [
                        "user_info" => $user_info,
                        "lea_form_list" => $result,
                        "dept_num" => $Department_Number
                    ]);
                    exit();
                } else if ($_SESSION["permission"] === "manager") {
                    $user_info = $this->Manager->GetManagerWithId($_SESSION["user_id"]);
                    $result = $this->Manager->GetListFormDepartment($Department_Number);
                    $this->ViewWithPer("department-leave-form-list", "manager", [
                        "user_info" => $user_info,
                        "lea_form_list" => $result
                    ]);
                    exit();
                } else if ($_SESSION["permission"] === "employee") {
                    http_response_code(403);
                    header('Location: /page-error-403.html');
                    exit();
                } else {
                    http_response_code(403);
                    header('Location: /page-error-403.html');
                    exit();
                }
            } else {
                http_response_code(403);
                header('Location: /page-error-403.html');
                exit();
            }
        } else {
            http_response_code(404);
            header('Location: /page-error-404.html');
            exit();
        }

    }
}