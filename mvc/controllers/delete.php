<?php


class delete extends Controller
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

    function manager($IdAccount)
    {
        if (isset($_SESSION["permission"])) {
            if ($_SESSION["permission"] === "admin") {
                $delete_result = $this->Manager->DeleteManager($IdAccount);
                if ($delete_result === true) {
                    echo '<script type="text/javascript">';
                    echo 'alert("Delete successful");';  //success messenge
                    echo 'window.location.href = "/listed/manager";'; //redirect to list manager
                    echo '</script>';
                    exit();
                } else {
                    echo '<script type="text/javascript">';
                    echo 'alert("Something wrong, try again!");';  //success messenge
                    echo 'window.location.href = "/listed/manager";'; //redirect to list manager
                    echo '</script>';
                    exit();
                }
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

    function employee($IdAccount)
    {
        if (isset($_SESSION["permission"])) {
            if ($_SESSION["permission"] === "admin") {
                $delete_result = $this->Employee->DeleteEmployee($IdAccount);
                if ($delete_result === true) {
                    echo '<script type="text/javascript">';
                    echo 'alert("Delete successful");';  //success messenge
                    echo 'window.location.href = "/listed/employee";'; //redirect to list manager
                    echo '</script>';
                    exit();
                } else {
                    echo '<script type="text/javascript">';
                    echo 'alert("Something wrong, try again!");';  //success messenge
                    echo 'window.location.href = "/listed/employee";'; //redirect to list manager
                    echo '</script>';
                    exit();
                }
            } else if ($_SESSION["permission"] === "manager") {
                $delete_result = $this->Employee->DeleteEmployee($IdAccount);
                if ($delete_result === true) {
                    echo '<script type="text/javascript">';
                    echo 'alert("Delete successful");';  //success messenge
                    echo 'window.location.href = "/listed/employee";'; //redirect to list manager
                    echo '</script>';
                    exit();
                } else {
                    echo '<script type="text/javascript">';
                    echo 'alert("Something wrong, try again!");';  //success messenge
                    echo 'window.location.href = "javascript:history.back()";'; //redirect to list manager
                    echo '</script>';
                    exit();
                }
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
    }

    function leave_day_form($IdForm)
    {
        if ($this->Leave_Day_Form->CheckValidForm($IdForm) === true) {
            if (isset($_SESSION["permission"])) {
                if ($_SESSION["permission"] === "admin") {
                    $delete_result = $this->Leave_Day_Form->DeleteForm($IdForm);
                    if ($delete_result === true) {
                        echo '<script type="text/javascript">';
                        echo 'alert("Delete successful");';  //success messenge
                        echo 'window.location.href = "javascript:history.back()";";'; //redirect to list manager
                        echo '</script>';
                        exit();
                    } else {
                        echo '<script type="text/javascript">';
                        echo 'alert("Something wrong, try again!");';  //success messenge
                        echo 'window.location.href = "javascript:history.back()";'; //redirect to list manager
                        echo '</script>';
                        exit();
                    }
                } else if ($_SESSION["permission"] === "manager") {
                    $result1 = $this->Leave_Day_Form->GetUserFromForm($IdForm);
                    if ($result1["IdAccount_Employess"] === $_SESSION['user_id']) {
                        $delete_result = $this->Leave_Day_Form->DeleteForm($IdForm);
                        if ($delete_result === true) {
                            echo '<script type="text/javascript">';
                            echo 'alert("Delete successful");';  //success messenge
                            echo 'window.location.href = "javascript:history.back()";";'; //redirect to list manager
                            echo '</script>';
                            exit();
                        } else {
                            echo '<script type="text/javascript">';
                            echo 'alert("Something wrong, try again!");';  //success messenge
                            echo 'window.location.href = "javascript:history.back()";'; //redirect to list manager
                            echo '</script>';
                            exit();
                        }
                    } else if ($this->Employee->CheckValidEmployee($result1["IdAccount_Employess"]) === true) { //if this is employee
                        $delete_result = $this->Leave_Day_Form->DeleteForm($IdForm);
                        if ($delete_result === true) {
                            echo '<script type="text/javascript">';
                            echo 'alert("Delete successful");';  //success messenge
                            echo 'window.location.href = "javascript:history.back()";";'; //redirect to list manager
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
                        http_response_code(403);
                        header('Location: /page-error-403.html');
                        exit();
                    }
                } else if ($_SESSION ["permission"] === "employee") {
                    $result1 = $this->Leave_Day_Form->GetUserFromForm($IdForm);
                    if ($result1["IdAccount_Employess"] === $_SESSION['user_id']) {
                        $delete_result = $this->Leave_Day_Form->DeleteForm($IdForm);
                        if ($delete_result === true) {
                            echo '<script type="text/javascript">';
                            echo 'alert("Delete successful");';  //success messenge
                            echo 'window.location.href = "javascript:history.back()";";'; //redirect to list manager
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
                        http_response_code(403);
                        header('Location: /page-error-403.html');
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
            http_response_code(404);
            header('Location: /page-error-404.html');
            exit();
        }
    }
}