<?php

class api extends Controller
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
        $this->Department = $this->model("Department");
    }

    public function index()
    {
        http_response_code(403);
        header('Location: /page-error-403.html');
        exit();
    }

    public function GetSalaryMonth()
    {
        if (isset($_SESSION["permission"])) {
            if ($_SESSION["permission"] === "manager") {
                $Year = date('Y');
                $salary_array = [];
                $salary_in_year = $this->Manager->GetYearSalary($_SESSION['user_id'], $Year);
                foreach ($salary_in_year as $key => $value) {
                    array_push($salary_array, intval($value["Total_Salary"]));
                }
                echo json_encode($salary_array);
            } else if ($_SESSION["permission"] === "employee") {
                $Year = date('Y');
                $salary_array = [];
                $salary_in_year = $this->Employee->GetYearSalary($_SESSION['user_id'], $Year);
                foreach ($salary_in_year as $key => $value) {
                    array_push($salary_array, intval($value["Total_Salary"]));
                }

                echo json_encode($salary_array);
            } else {
                http_response_code(403);
                header('Location: /page-error-403.html');
                exit();
            }
        }
    }

    public function GetAccount()
    {
        if (isset($_SESSION["permission"])) {
            if ($_SESSION["permission"] === "admin") {
                $acc_array = [];
                $result = $this->User->GetAccStateForJs();
                foreach ($result as $key => $value) {
                    array_push($acc_array, intval($value["Amount"]));
                }
                echo json_encode($acc_array);
            } else {
                http_response_code(403);
                header('Location: /page-error-403.html');
                exit();
            }
        }
    }

    public function GetForm()
    {
        if (isset($_SESSION["permission"])) {
            if ($_SESSION["permission"] === "admin") {
                $acc_array = [];
                $result = $this->Leave_Day_Form->GetFormStatusForJs();
                foreach ($result as $key => $value) {
                    array_push($acc_array, intval($value["Amount"]));
                }
                echo json_encode($acc_array);
            } else {
                http_response_code(403);
                header('Location: /page-error-403.html');
                exit();
            }
        }
    }

}