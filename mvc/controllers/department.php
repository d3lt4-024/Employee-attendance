<?php


class department extends Controller
{
    private $User;
    private $Manager;

    public function __construct()
    {
        $this->User = $this->model("User");
        $this->Manager = $this->model("Manager");
    }

    function index()
    {
        http_response_code(403);
        header('Location: /page-error-403.html');
        exit();
    }

    function view($Department_Number)
    {
        if ($this->User->CheckValidDept($Department_Number) === true) {
            if (isset($_SESSION["permission"])) {
                if ($_SESSION["permission"] === "admin") {
                    $user_info = $this->User->GetInfoUserByID($_SESSION['user_id']);
                    $result = $this->User->GetAllEmpInDept($Department_Number);
                    $Department_Name = $result[0]["Department_Name"];
                    $this->ViewWithPer("list-employee-department", "admin", [
                        "result" => $result,
                        "user_info" => $user_info,
                        "dept_name" => $Department_Name
                    ]);
                    exit();
                } else if ($_SESSION["permission"] === "manager") {
                    $user_info = $this->Manager->GetManagerWithId($_SESSION['user_id']);
                    $result = $this->User->GetEmpInDept($Department_Number);
                    $Department_Name = $result[0]["Department_Name"];
                    $this->ViewWithPer("list-employee-department", "manager", [
                        "result" => $result,
                        "user_info" => $user_info,
                        "dept_name" => $Department_Name
                    ]);
                    exit();
                } else if ($_SESSION["permission"] === "employee") {
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
        } else {
            http_response_code(404);
            header('Location: /page-error-404.html');
            exit();
        }

    }
}