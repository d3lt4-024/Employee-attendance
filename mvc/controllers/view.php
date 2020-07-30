<?php


class view extends Controller
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

    function manager($IdAccount)
    {
        if ($this->User->CheckValidManager($IdAccount) === true) {
            if (isset($_SESSION["permission"])) {
                if ($_SESSION["permission"] === "admin") {
                    $user_info = $this->User->GetInfoUserByID($_SESSION['user_id']);
                    $result1 = $this->Manager->GetManagerWithId($IdAccount);
                    $this->ViewWithPer("edit-user-manager", "admin", [
                        "default" => $result1,
                        "user_info" => $user_info
                    ]);
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
        } else {
            http_response_code(404);
            header('Location: /page-error-404.html');
            exit();
        }
    }


    function employee($IdAccount)
    {
        if ($this->User->CheckValidEmployee($IdAccount) === true) {
            if (isset($_SESSION["permission"])) {
                if ($_SESSION["permission"] === "admin") {
                    $user_info = $this->User->GetInfoUserByID($_SESSION['user_id']);
                    $result1 = $this->Employee->GetEmployeeWithId($IdAccount);
                    $this->ViewWithPer("edit-user-employee", "admin", [
                        "default" => $result1,
                        "user_info" => $user_info
                    ]);
                    exit();
                } else if ($_SESSION["permission"] === "manager") {
                    $user_info = $this->Manager->GetManagerWithId($_SESSION['user_id']);
                    $result1 = $this->Employee->GetEmployeeWithId($IdAccount);
                    $this->ViewWithPer("edit-user-employee", "manager", [
                        "default" => $result1,
                        "user_info" => $user_info
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

    function leave_day_form($IdForm)
    {
        if ($this->User->CheckValidForm($IdForm) === true) {
            if (isset($_SESSION["permission"])) {
                if ($_SESSION["permission"] === "manager") {
                    $result1 = $this->Manager->GetUserFromForm($IdForm);
                    if ($result1["IdAccount_Employess"] === $_SESSION['user_id']) {
                        $user_info = $this->Manager->GetManagerWithId($_SESSION['user_id']);
                        $result2 = $this->Manager->GetLeaDayFormWithFormID($IdForm);
                        $this->ViewWithPer("edit-leave-form", "manager", [
                            "user_info" => $user_info,
                            "default" => $result2
                        ]);
                        exit();
                    }
                } else if ($_SESSION ["permission"] === "admin") {

                } else if ($_SESSION ["permission"] === "employee") {
                    $result1 = $this->Employee->GetUserFromForm($IdForm);
                    if ($result1["IdAccount_Employess"] === $_SESSION['user_id']) {
                        $user_info = $this->Employee->GetEmployeeWithId($_SESSION['user_id']);
                        $result2 = $this->Employee->GetLeaDayFormWithFormID($IdForm);
                        $this->ViewWithPer("edit-leave-form", "employee", [
                            "user_info" => $user_info,
                            "default" => $result2
                        ]);
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
        } else {
            http_response_code(404);
            header('Location: /page-error-404.html');
            exit();
        }
    }

    function department_leave_day_form($IdForm)
    {
        if ($this->User->CheckValidForm($IdForm) === true) {
            if (isset($_SESSION["permission"])) {
                if ($_SESSION["permission"] === "manager") {
                    $user_info = $this->Manager->GetManagerWithId($_SESSION['user_id']);
                    $result2 = $this->Manager->GetLeaDayFormWithFormID($IdForm);
                    $this->ViewWithPer("edit-department-leave-form", "manager", [
                        "user_info" => $user_info,
                        "default" => $result2
                    ]);
                    exit();
                } else if ($_SESSION["permission"] === "admin") {
                    $user_info = $this->User->GetInfoUserByID($_SESSION['user_id']);
                    $result2 = $this->User->GetLeaDayFormWithFormID($IdForm);
                    $this->ViewWithPer("edit-department-leave-form", "admin", [
                        "user_info" => $user_info,
                        "default" => $result2
                    ]);
                    exit();
                } else if ($_SESSION ["permission"] === "employee") {
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