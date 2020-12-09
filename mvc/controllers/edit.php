<?php


class edit extends Controller
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

    function index()
    {
        http_response_code(403);
        header('Location: /page-error-403.html');
        exit();
    }

    function manager($IdAccount)
    {
        if ($this->Manager->CheckValidManager($IdAccount) === true) {
            if (isset($_SESSION["permission"])) {
                if ($_SESSION["permission"] === "admin") {
                    if (isset($_POST["submit"])) {
                        try {
                            //check empty field
                            if (empty($_POST['EmployeeID'])) {
                                throw new Exception("ID Nhân viên không được để trống");
                            }
                            if (empty($_POST['Name'])) {
                                throw new Exception("Họ tên không được để trống");
                            }
                            if (empty($_POST['Email'])) {
                                throw new Exception("Email không được để trống");
                            }
                            if (empty($_POST['PhoneNum'])) {
                                throw new Exception("Số điện thoại không được để trống");
                            }
                            if (empty($_POST['Gender'])) {
                                throw new Exception("Giới tính không được để trống");
                            }
                            if (empty($_POST['Hire_Date'])) {
                                throw new Exception("Ngày bắt đầu làm việc không được để trống");
                            }
                            if (empty($_POST['Job'])) {
                                throw new Exception("Công việc không được để trống");
                            }
                            if (empty($_POST['Birth_Date'])) {
                                throw new Exception("Ngày sinh không được để trống");
                            }
                            if (empty($_POST['Department_Name'])) {
                                throw new Exception("Phòng ban quản lý không được để trống");
                            }
                            if (empty($_POST['Username'])) {
                                throw new Exception("Username không được để trống");
                            }
                            //check form data
                            if (preg_match('/^[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{4}$/', $_POST['Username']) === false) { //example: CN17AT0001
                                throw new Exception("Username không hợp lệ");
                            }
                            if (preg_match('/^[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{4}$/', $_POST['EmployeeID']) === false) { //example: CN17AT0001
                                throw new Exception("ID Nhân viên không hợp lệ");
                            }
                            if (preg_match('/^0[1-9]{1}[0-9]{8}$/', $_POST['PhoneNum'] === false)) { //exmaple: 0856562876
                                throw new Exception("Số điện thoại không hợp lệ");
                            }
                            if (preg_match('/^(0[1-9]|1[0-2])\/(0[1-9]|[1-2][0-9]|3[0-1])\/[0-9]{4}$/', $_POST['Hire_Date'] === false)) { //dd-mm-yyyy
                                throw new Exception("Ngày bắt đầu làm việc không hợp lệ");
                            }
                            if (preg_match('/^(0[1-9]|1[0-2])\/(0[1-9]|[1-2][0-9]|3[0-1])\/[0-9]{4}$/', $_POST['Birth_Date'] === false)) { //dd-mm-yyyy
                                throw new Exception("Ngày sinh không hợp lệ");
                            }
                            //delete space and special char in form data
                            $IdAccount = $_SESSION["manager_edit"];
                            $Post_EmployeeID = trim(($_POST['EmployeeID']));
                            $Post_Name = trim($_POST['Name']);
                            $Post_Email = trim($_POST['Email']);
                            $Post_PhoneNum = trim($_POST['PhoneNum']);
                            $Post_Gender = trim($_POST['Gender']);
                            $Post_Hire_Date = $this->reformat_date(trim($_POST['Hire_Date']));
                            $Post_Job = trim($_POST['Job']);
                            $Post_Birth_Date = $this->reformat_date(trim($_POST['Birth_Date']));
                            $Post_Department_Number = $this->Department->GetDeptFromName(trim($_POST['Department_Name']));
                            $Post_Username = trim($_POST['Username']);
                            //value store what will be edited
                            $EmployeeID = "";
                            $Name = "";
                            $Email = "";
                            $PhoneNum = "";
                            $Gender = "";
                            $Hire_Date = "";
                            $Job = "";
                            $Birth_Date = "";
                            $Department_Number = "";
                            $Username = "";
                            $Password = "";
                            //check what is edited
                            $default_info = $this->Manager->GetManagerWithId($IdAccount);
                            if ($Post_EmployeeID !== $default_info["Username"]) {
                                if ($this->Manager->CheckValidEmployeeID($Post_EmployeeID) === true) {
                                    throw new Exception("ID nhân viên đã được sử dụng");
                                }
                                $EmployeeID = $Post_EmployeeID;
                            } else {
                                $EmployeeID = $default_info["Username"];
                            }
                            if ($Post_Name !== $default_info["Name"]) {
                                $Name = $Post_Name;
                            } else {
                                $Name = $default_info["Name"];
                            }
                            if ($Post_Email !== $default_info["Email"]) {
                                if ($this->User->CheckValidUsername($Post_Email) === true) {
                                    throw new Exception("Email đã được sử dụng");
                                }
                                $Email = $Post_Email;
                            } else {
                                $Email = $default_info["Email"];
                            }
                            if ($Post_PhoneNum !== $default_info["PhoneNum"]) {
                                $PhoneNum = $Post_PhoneNum;
                            } else {
                                $PhoneNum = $default_info["PhoneNum"];
                            }
                            if ($Post_Gender !== $default_info["Gender"]) {
                                $Gender = $Post_Gender;
                            } else {
                                $Gender = $default_info["Gender"];
                            }
                            if ($Post_Hire_Date !== $default_info["Hire_Date"]) {
                                $Hire_Date = $Post_Hire_Date;
                            } else {
                                $Hire_Date = $default_info["Hire_Date"];
                            }
                            if ($Post_Job !== $default_info["Job"]) {
                                $Job = $Post_Job;
                            } else {
                                $Job = $default_info["Job"];
                            }
                            if ($Post_Birth_Date !== $default_info["Birth_Date"]) {
                                $Birth_Date = $Post_Birth_Date;
                            } else {
                                $Birth_Date = $default_info["Birth_Date"];
                            }
                            if ($Post_Department_Number !== $default_info["DM.Department_Number"]) {
                                $Department_Number = $Post_Department_Number[0];
                            } else {
                                $Department_Number = $default_info["DM.Department_Number"];
                            }
                            if ($Post_Username !== $default_info["Username"]) {
                                if ($this->User->CheckValidUsername($Post_Username) === true) {
                                    throw new Exception("Username đã được sử dụng");
                                }
                                if ($Post_Username !== $EmployeeID) {
                                    throw new Exception("Username phải trùng với ID nhân viên");
                                }
                                $Username = $Post_Username;
                            } else {
                                $Username = $default_info["Username"];
                            }
                            if ($_POST['Password'] !== "") {
                                $Post_Password = hash('sha256', trim($_POST['Password']));
                                if ($Post_Password !== $default_info["Password"]) {
                                    $Password = $Post_Password;
                                } else {
                                    $Password = $default_info["Password"];
                                }
                            } else {
                                $Password = $default_info["Password"];
                            }
                            $edit_result = $this->Manager->UpdateInfoManager($IdAccount, $Name, $Email, $PhoneNum, $Username, $Password, $EmployeeID, $Gender, $Hire_Date, $Job, $Birth_Date, $Department_Number); //update profile in User table and GiaoVien table
                            if ($edit_result === false) {
                                echo '<script type="text/javascript">';
                                echo 'alert("Có lỗi xảy ra, vui lòng thử lại!");';  //error messenge
                                echo 'window.location.href = "javascript:history.back()";';
                                echo '</script>';
                                exit();
                            } else {
                                echo '<script type="text/javascript">';
                                echo 'alert("Sửa thông tin thành công");';  //success messenge
                                echo 'window.location.href = "/listed/manager";'; //redirect to list teacher
                                echo '</script>';
                                exit();
                            }
                        } catch (Exception $e) {
                            $error_msg = $e->getMessage();
                        }
                        $this->ViewWithPer("edit-user-manager", "admin", [
                            "error_msg" => $error_msg
                        ]);
                        exit();
                    } else {
                        http_response_code(500);
                        header('Location: /page-error-500.html');
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
        } else {
            http_response_code(404);
            header('Location: /page-error-404.html');
            exit();
        }
    }

    private function reformat_date($date_before) // reformat date to yyyy-mm-dd for insert to db
    {
        $dateArray = explode('/', $date_before);
        $date = $dateArray[2] . '-' . $dateArray[0] . '-' . $dateArray[1];
        return $date;
    }

    function employee($IdAccount)
    {
        if ($this->Employee->CheckValidEmployee($IdAccount) === true) {
            if (isset($_SESSION["permission"])) {
                if ($_SESSION["permission"] === "admin" || $_SESSION["permission"] === "manager") {
                    if (isset($_POST["submit"])) {
                        try {
                            //check empty field
                            if (empty($_POST['EmployeeID'])) {
                                throw new Exception("ID Nhân viên không được để trống");
                            }
                            if (empty($_POST['Name'])) {
                                throw new Exception("Họ tên không được để trống");
                            }
                            if (empty($_POST['Email'])) {
                                throw new Exception("Email không được để trống");
                            }
                            if (empty($_POST['PhoneNum'])) {
                                throw new Exception("Số điện thoại không được để trống");
                            }
                            if (empty($_POST['Gender'])) {
                                throw new Exception("Giới tính không được để trống");
                            }
                            if (empty($_POST['Hire_Date'])) {
                                throw new Exception("Ngày bắt đầu làm việc không được để trống");
                            }
                            if (empty($_POST['Job'])) {
                                throw new Exception("Công việc không được để trống");
                            }
                            if (empty($_POST['Birth_Date'])) {
                                throw new Exception("Ngày sinh không được để trống");
                            }
                            if (empty($_POST['Department_Name'])) {
                                throw new Exception("Phòng ban không được để trống");
                            }
                            if (empty($_POST['Username'])) {
                                throw new Exception("Username không được để trống");
                            }
                            //check form data
                            if (preg_match('/^[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{4}$/', $_POST['Username']) === false) { //example: CN17AT0001
                                throw new Exception("Username không hợp lệ");
                            }
                            if (preg_match('/^[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{4}$/', $_POST['EmployeeID']) === false) { //example: CN17AT0001
                                throw new Exception("ID Nhân viên không hợp lệ");
                            }
                            if (preg_match('/^0[1-9]{1}[0-9]{8}$/', $_POST['PhoneNum'] === false)) { //exmaple: 0856562876
                                throw new Exception("Số điện thoại không hợp lệ");
                            }
                            if (preg_match('/^(0[1-9]|1[0-2])\/(0[1-9]|[1-2][0-9]|3[0-1])\/[0-9]{4}$/', $_POST['Hire_Date'] === false)) { //dd-mm-yyyy
                                throw new Exception("Ngày bắt đầu làm việc không hợp lệ");
                            }
                            if (preg_match('/^(0[1-9]|1[0-2])\/(0[1-9]|[1-2][0-9]|3[0-1])\/[0-9]{4}$/', $_POST['Birth_Date'] === false)) { //dd-mm-yyyy
                                throw new Exception("Ngày sinh không hợp lệ");
                            }
                            //delete space and special char in form data
                            $IdAccount = $_SESSION["employee_edit"];
                            $Post_EmployeeID = trim(($_POST['EmployeeID']));
                            $Post_Name = trim($_POST['Name']);
                            $Post_Email = trim($_POST['Email']);
                            $Post_PhoneNum = trim($_POST['PhoneNum']);
                            $Post_Gender = trim($_POST['Gender']);
                            $Post_Hire_Date = $this->reformat_date(trim($_POST['Hire_Date']));
                            $Post_Job = trim($_POST['Job']);
                            $Post_Birth_Date = $this->reformat_date(trim($_POST['Birth_Date']));
                            $Post_Department_Number = $this->Department->GetDeptFromName(trim($_POST['Department_Name']));
                            $Post_Username = trim($_POST['Username']);
                            //value store what will be edited
                            $EmployeeID = "";
                            $Name = "";
                            $Email = "";
                            $PhoneNum = "";
                            $Gender = "";
                            $Hire_Date = "";
                            $Job = "";
                            $Birth_Date = "";
                            $Department_Number = "";
                            $Username = "";
                            $Password = "";
                            //check what is edited
                            $default_info = $this->Employee->GetEmployeeWithId($IdAccount);
                            if ($Post_EmployeeID !== $default_info["Username"]) {
                                if ($this->Employee->CheckValidEmployeeID($Post_EmployeeID) === true) {
                                    throw new Exception("ID nhân viên đã được sử dụng");
                                }
                                $EmployeeID = $Post_EmployeeID;
                            } else {
                                $EmployeeID = $default_info["Username"];
                            }
                            if ($Post_Name !== $default_info["Name"]) {
                                $Name = $Post_Name;
                            } else {
                                $Name = $default_info["Name"];
                            }
                            if ($Post_Email !== $default_info["Email"]) {
                                if ($this->User->CheckValidUsername($Post_Email) === true) {
                                    throw new Exception("Email đã được sử dụng");
                                }
                                $Email = $Post_Email;
                            } else {
                                $Email = $default_info["Email"];
                            }
                            if ($Post_PhoneNum !== $default_info["PhoneNum"]) {
                                $PhoneNum = $Post_PhoneNum;
                            } else {
                                $PhoneNum = $default_info["PhoneNum"];
                            }
                            if ($Post_Gender !== $default_info["Gender"]) {
                                $Gender = $Post_Gender;
                            } else {
                                $Gender = $default_info["Gender"];
                            }
                            if ($Post_Hire_Date !== $default_info["Hire_Date"]) {
                                $Hire_Date = $Post_Hire_Date;
                            } else {
                                $Hire_Date = $default_info["Hire_Date"];
                            }
                            if ($Post_Job !== $default_info["Job"]) {
                                $Job = $Post_Job;
                            } else {
                                $Job = $default_info["Job"];
                            }
                            if ($Post_Birth_Date !== $default_info["Birth_Date"]) {
                                $Birth_Date = $Post_Birth_Date;
                            } else {
                                $Birth_Date = $default_info["Birth_Date"];
                            }
                            if ($Post_Department_Number !== $default_info["DE.Department_Number"]) {
                                $Department_Number = $Post_Department_Number[0];
                            } else {
                                $Department_Number = $default_info["DE.Department_Number"];
                            }
                            if ($Post_Username !== $default_info["Username"]) {
                                if ($this->User->CheckValidUsername(trim($_POST['Username'])) === true) {
                                    throw new Exception("Username đã được sử dụng");
                                }
                                if ($Post_Username !== $EmployeeID) {
                                    throw new Exception("Username phải là ID nhân viên");
                                }
                                $Username = $Post_Username;
                            } else {
                                $Username = $default_info["Username"];
                            }
                            if ($_POST['Password'] !== "") {
                                $Post_Password = hash('sha256', trim($_POST['Password']));
                                if ($Post_Password !== $default_info["Password"]) {
                                    $Password = $Post_Password;
                                } else {
                                    $Password = $default_info["Password"];
                                }
                            } else {
                                $Password = $default_info["Password"];
                            }
                            $edit_result = $this->Employee->UpdateInfoEmployee($IdAccount, $Name, $Email, $PhoneNum, $Username, $Password, $EmployeeID, $Gender, $Hire_Date, $Job, $Birth_Date, $Department_Number); //update profile in User table and GiaoVien table
                            if ($edit_result === false) {
                                echo '<script type="text/javascript">';
                                echo 'alert("Có lỗi xảy ra, vui lòng thử lại!");';  //error messenge
                                echo 'window.location.href = "javascript:history.back()";';
                                echo '</script>';
                                exit();
                            } else {
                                echo '<script type="text/javascript">';
                                echo 'alert("Sửa thông tin thành công");';  //success messenge
                                echo 'window.location.href = "/listed/manager";'; //redirect to list teacher
                                echo '</script>';
                                exit();
                            }
                        } catch (Exception $e) {
                            $error_msg = $e->getMessage();
                        }
                        $this->ViewWithPer("edit-user-employee", "admin", [
                            "error_msg" => $error_msg
                        ]);
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

    function account($IdAccount)
    {
        if ($this->User->CheckValidAccount($IdAccount) === true) {
            if ($IdAccount === $_SESSION['user_id']) {
                if (isset($_POST["submit"])) {
                    try {
                        //check empty field
                        if (empty($_POST['Email'])) {
                            throw new Exception("Email không được để trống");
                        }
                        if (empty($_POST['PhoneNum'])) {
                            throw new Exception("Số điện thoại không được để trống");
                        }
                        if (empty($_POST['Username'])) {
                            throw new Exception("Username không được để trống");
                        }
                        if (empty($_POST['Password'])) {
                            throw new Exception("Password không được để trống");
                        }
                        //check form data
                        if (preg_match('/^[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{4}$/', $_POST['Username']) === false) { //example: CN17AT0001
                            throw new Exception("Username không hợp lệ");
                        }
                        if (preg_match('/^0[1-9]{1}[0-9]{8}$/', $_POST['PhoneNum'] === false)) { //exmaple: 0856562876
                            throw new Exception("Số điện thoại không hợp lệ");
                        }
                        //delete space and special char in form data
                        $Post_Email = trim($_POST['Email']);
                        $Post_PhoneNum = trim($_POST['PhoneNum']);
                        $Post_Username = trim($_POST['Username']);
                        //value store what will be edited
                        $Email = "";
                        $PhoneNum = "";
                        $Username = "";
                        $Password = "";
                        //check what is edited
                        $default_info = $this->User->GetInfoUserByID($IdAccount);
                        if ($Post_Email !== $default_info["Email"]) {
                            $Email = $Post_Email;
                        } else {
                            $Email = $default_info["Email"];
                        }
                        if ($Post_PhoneNum !== $default_info["PhoneNum"]) {
                            $PhoneNum = $Post_PhoneNum;
                        } else {
                            $PhoneNum = $default_info["PhoneNum"];
                        }
                        if ($Post_Username !== $default_info["Username"]) {
                            $Username = $Post_Username;
                        } else {
                            $Username = $default_info["Username"];
                        }
                        if ($_POST['Password'] !== "") {
                            $Post_Password = hash('sha256', trim($_POST['Password']));
                            if ($Post_Password !== $default_info["Password"]) {
                                $Password = $Post_Password;
                            } else {
                                $Password = $default_info["Password"];
                            }
                        } else {
                            $Password = $default_info["Password"];
                        }
                        $edit_result = $this->User->UpdateSettingAccount($IdAccount, $Username, $Password, $PhoneNum, $Email); //update profile in User table and GiaoVien table
                        if ($edit_result === false) {
                            echo '<script type="text/javascript">';
                            echo 'alert("Có lỗi xảy ra vui lòng thử lại!");';  //error messenge
                            echo 'window.location.href = "javascript:history.back()";';
                            echo '</script>';
                            exit();
                        } else {
                            echo '<script type="text/javascript">';
                            echo 'alert("Cập nhật thông tin thành công");';  //success messenge
                            echo 'window.location.href = "/";'; //redirect to list teacher
                            echo '</script>';
                            exit();
                        }
                    } catch (Exception $e) {
                        $error_msg = $e->getMessage();
                    }
                    $this->ViewWithPer("account-setting", "admin", [
                        "error_msg" => $error_msg
                    ]);
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

    function leave_day_form($IdForm)
    {
        if ($this->Leave_Day_Form->CheckValidForm($IdForm) === true) {
            if (isset($_SESSION["permission"])) {
                if ($_SESSION["permission"] === "manager" || $_SESSION["permission"] === "employee") {
                    if (isset($_POST["submit"])) {
                        try {
                            //check empty field
                            if (empty($_POST['Start_Date'])) {
                                throw new Exception("Ngày bắt đầu không được để trống");
                            }
                            if (empty($_POST['End_Date'])) {
                                throw new Exception("Ngày kết thúc không được để trống");
                            }
                            if (empty($_POST['Reason'])) {
                                throw new Exception("Lý do không được để trống");
                            }
                            //check form data
                            if (preg_match('/^(0[1-9]|1[0-2])\/(0[1-9]|[1-2][0-9]|3[0-1])\/[0-9]{4}$/', $_POST['Start_Date'] === false)) { //dd-mm-yyyy
                                throw new Exception("Ngày bắt đầu không hợp lệ");
                            }
                            if (preg_match('/^(0[1-9]|1[0-2])\/(0[1-9]|[1-2][0-9]|3[0-1])\/[0-9]{4}$/', $_POST['End_Date'] === false)) { //dd-mm-yyyy
                                throw new Exception("Ngày kết thúc không hợp lệ");
                            }
                            //delete space and special char in form data
                            $IdAccount_Employess = $_SESSION["user_id"];
                            $IdForm = $_SESSION["form_edit"];
                            $Start_Date = $this->reformat_date(trim($_POST['Start_Date'])); //yyyy-mm-dd
                            $End_Date = $this->reformat_date(trim($_POST['End_Date'])); //yyyy-mm-dd
                            $Reason = trim($_POST['Reason']);
                            $create_result = $this->Leave_Day_Form->EditLeaDayForm($IdAccount_Employess, $IdForm, $Start_Date, $End_Date, $Reason); //update profile in User table and GiaoVien table
                            if ($create_result === false) {
                                echo '<script type="text/javascript">';
                                echo 'alert("Có lỗi xảy ra vui lòng thử lại!");';  //error messenge
                                echo 'window.location.href = "javascript:history.back()";';
                                echo '</script>';
                                exit();
                            } else {
                                echo '<script type="text/javascript">';
                                echo 'alert("Cập nhật thông tin thành công");';  //success messenge
                                echo 'window.location.href = "/listed/my_leave_form";'; //redirect to list teacher
                                echo '</script>';
                                exit();
                            }
                        } catch (Exception $e) {
                            $error_msg = $e->getMessage();
                        }
                        $this->ViewWithPer("edit-leave-day-form", "employee", [
                            "error_msg" => $error_msg
                        ]);
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
        if ($this->Leave_Day_Form->CheckValidForm($IdForm) === true) {
            if (isset($_SESSION["permission"])) {
                if ($_SESSION["permission"] === "admin" || $_SESSION["permission"] === "manager") {
                    if (isset($_POST["submit"])) {
                        try {
                            //check empty field
                            if (empty($_POST['IdAccount'])) {
                                throw new Exception("ID Tài khoản không được để trống");
                            }
                            if (empty($_POST['Start_Date'])) {
                                throw new Exception("Ngày bắt đầu không được để trống");
                            }
                            if (empty($_POST['End_Date'])) {
                                throw new Exception("Ngày kết thúc không được để trống");
                            }
                            if (empty($_POST['Reason'])) {
                                throw new Exception("Lý do không được để trống");
                            }
                            //check form data
                            if (preg_match('/^(0[1-9]|1[0-2])\/(0[1-9]|[1-2][0-9]|3[0-1])\/[0-9]{4}$/', $_POST['Start_Date'] === false)) { //dd-mm-yyyy
                                throw new Exception("Ngày bắt đầu không hợp lệ");
                            }
                            if (preg_match('/^(0[1-9]|1[0-2])\/(0[1-9]|[1-2][0-9]|3[0-1])\/[0-9]{4}$/', $_POST['End_Date'] === false)) { //dd-mm-yyyy
                                throw new Exception("Ngày kết thúc không hợp lệ");
                            }
                            //delete space and special char in form data
                            $IdAccount_Employess = trim(($_POST['IdAccount']));
                            $IdForm = trim(($_POST['IdForm']));
                            $Start_Date = $this->reformat_date(trim($_POST['Start_Date']));
                            $End_Date = $this->reformat_date(trim($_POST['End_Date']));
                            $Reason = trim($_POST['Reason']);
                            $create_result = $this->Leave_Day_Form->EditLeaDayForm($IdAccount_Employess, $IdForm, $Start_Date, $End_Date, $Reason); //update profile in User table and GiaoVien table
                            if ($create_result === false) {
                                echo '<script type="text/javascript">';
                                echo 'alert("Có lỗi xảy ra vui lòng thử lại!");';  //error messenge
                                echo 'window.location.href = "javascript:history.back()";';
                                echo '</script>';
                                exit();
                            } else {
                                echo '<script type="text/javascript">';
                                echo 'alert("Cập nhật thông tin thành công");';  //success messenge
                                echo 'window.location.href = "/";'; //redirect to list teacher
                                echo '</script>';
                                exit();
                            }
                        } catch (Exception $e) {
                            $error_msg = $e->getMessage();
                        }
                        $this->ViewWithPer("edit-department-leave-day-form", "manager", [
                            "error_msg" => $error_msg
                        ]);
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