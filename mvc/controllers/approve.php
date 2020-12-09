<?php


class approve extends Controller
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

    function leave_day_form($IdForm)
    {
        if ($this->Leave_Day_Form->CheckValidForm($IdForm) === true) {
            if ($this->Leave_Day_Form->GetStatusForm($IdForm)["Form_Status"] === "Pending") {
                if (isset($_SESSION["permission"])) {
                    if ($_SESSION["permission"] === "admin" || $_SESSION["permission"] === "manager") {
                        $approve_result = $this->Leave_Day_Form->ApproveForm($IdForm);
                        if ($approve_result === true) {
                            echo '<script type="text/javascript">';
                            echo 'alert("Approve successful");';  //success messenge
                            echo 'window.location.href = "javascript:history.back()";'; //redirect to list manager
                            echo '</script>';
                            exit();
                        } else {
                            echo '<script type="text/javascript">';
                            echo 'alert("Something wrong, try again!");';  //success messenge
                            echo 'window.location.href = "javascript:history.back()";'; //redirect to list manager
                            echo '</script>';
                            exit();
                        }
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
                echo '<script type="text/javascript">';
                echo 'alert("This form already approved!");';  //success messenge
                echo 'window.location.href = "javascript:history.back()";'; //redirect to list manager
                echo '</script>';
                exit();
            }
        } else {
            http_response_code(404);
            header('Location: /page-error-404.html');
            exit();
        }
    }
}