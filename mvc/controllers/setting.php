<?php


class setting extends Controller
{
    private $User;
    private $Manager;
    private $Employee;
    private $Admin;
    private $Leave_Day_Form;
    private $Department;

    public function __construct()
    {
        $this->User = $this->model("User");
        $this->Manager = $this->model("Manager");
        $this->Employee = $this->model("Employee");
        $this->Admin = $this->model("Admin");
        $this->Leave_Day_Form = $this->model("Leave_Day_Form");
        $this->Department = $this->model("Departments");
    }
    function index()
    {
        http_response_code(403);
        header('Location: /page-error-403.html');
        exit();
    }

    function account($IdAccount)
    {
        if ($_SESSION['user_id'] === $IdAccount) {
            if (isset($_SESSION["permission"])) {
                if ($_SESSION["permission"] === "admin") {
                    $user_info = $this->User->GetInfoUserByID($_SESSION['user_id']);
                    $this->ViewWithPer("account-setting", "admin", [
                        "user_info" => $user_info
                    ]);
                    exit();
                } else if ($_SESSION["permission"] === "manager") {
                    $Month = date('m');
                    $Year = date('Y');
                    $user_info = $this->Manager->GetManagerWithId($_SESSION['user_id']);
                    $net_salary = $this->Manager->GetNetSalry($_SESSION['user_id'], $Month, $Year);
                    $this->ViewWithPer("account-setting", "manager", [
                        "user_info" => $user_info,
                        "net_salary" => $net_salary
                    ]);
                    exit();
                } else if ($_SESSION["permission"] === "employee") {
                    $Month = date('m');
                    $Year = date('Y');
                    $user_info = $this->Employee->GetEmployeeWithId($_SESSION['user_id']);
                    $net_salary = $this->Employee->GetNetSalry($_SESSION['user_id'], $Month, $Year);
                    $this->ViewWithPer("account-setting", "employee", [
                        "user_info" => $user_info,
                        "net_salary" => $net_salary
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
}