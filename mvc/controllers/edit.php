<?php


class edit extends Controller
{
    private $User;
    private $Manager;
    private $Employee;
    private $Department;

    public function __construct()
    {
        $this->User = $this->model("User");
        $this->Manager = $this->model("Manager");
        $this->Employee = $this->model("Employee");
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
        if ($this->User->CheckValidManager($IdAccount) === true) {
            if (isset($_SESSION["permission"])) {
                if ($_SESSION["permission"] === "admin") {
                    if (isset($_POST["submit"])) {
                        try {
                            //check empty field
                            if (intval($_POST['IdAccount']) !== intval($IdAccount)) {
                                throw new Exception("ID tài khoản không khớp");
                            }
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
                            if (preg_match('/^[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{4}$/', $_POST['Username']) === false) {
                                throw new Exception("Username không hợp lệ");
                            }
                            if (preg_match('/^[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{4}$/', $_POST['EmployeeID']) === false) {
                                throw new Exception("ID Nhân viên không hợp lệ");
                            }
                            if (preg_match('/^0[1-9]{1}[0-9]{8}$/', $_POST['PhoneNum'] === false)) {
                                throw new Exception("Số điện thoại không hợp lệ");
                            }
                            if (preg_match('/^(0[1-9]|1[0-2])\/(0[1-9]|[1-2][0-9]|3[0-1])\/[0-9]{4}$/', $_POST['Hire_Date'] === false)) {
                                throw new Exception("Ngày bắt đầu làm việc không hợp lệ");
                            }
                            if (preg_match('/^(0[1-9]|1[0-2])\/(0[1-9]|[1-2][0-9]|3[0-1])\/[0-9]{4}$/', $_POST['Birth_Date'] === false)) {
                                throw new Exception("Ngày sinh không hợp lệ");
                            }
                            //delete space and special char in form data
                            $IdAccount = trim($_POST['IdAccount']);
                            $EmployeeID = trim(($_POST['EmployeeID']));
                            $Name = trim($_POST['Name']);
                            $Email = trim($_POST['Email']);
                            $PhoneNum = trim($_POST['PhoneNum']);
                            $Gender = trim($_POST['Gender']);
                            $Hire_Date = $this->reformat_date(trim($_POST['Hire_Date']));
                            $Job = trim($_POST['Job']);
                            $Birth_Date = $this->reformat_date(trim($_POST['Birth_Date']));
                            $Department_Number = $this->Department->GetDeptFromName(trim($_POST['Department_Name']));
                            $Username = trim($_POST['Username']);
                            $Password = hash('sha256', trim($_POST['Password']));
                            $edit_result = $this->Manager->UpdateInfoManager($IdAccount, $Name, $Email, $PhoneNum, $Username, $Password, $EmployeeID, $Gender, $Hire_Date, $Job, $Birth_Date, $Department_Number[0]); //update profile in User table and GiaoVien table
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

    private function reformat_date($date_before)
    {
        $dateArray = explode('/', $date_before);
        $date = $dateArray[2] . '-' . $dateArray[0] . '-' . $dateArray[1];
        return $date;
    }

    function employee($IdAccount)
    {
        if ($this->User->CheckValidEmployee($IdAccount) === true) {
            if (isset($_SESSION["permission"])) {
                if ($_SESSION["permission"] === "admin") {
                    if (isset($_POST["submit"])) {
                        try {
                            //check empty field
                            if (intval($_POST['IdAccount']) !== intval($IdAccount)) {
                                throw new Exception("ID tài khoản không khớp");
                            }
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
                            if (preg_match('/^[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{4}$/', $_POST['Username']) === false) {
                                throw new Exception("Username không hợp lệ");
                            }
                            if (preg_match('/^[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{4}$/', $_POST['EmployeeID']) === false) {
                                throw new Exception("ID Nhân viên không hợp lệ");
                            }
                            if (preg_match('/^0[1-9]{1}[0-9]{8}$/', $_POST['PhoneNum'] === false)) {
                                throw new Exception("Số điện thoại không hợp lệ");
                            }
                            if (preg_match('/^(0[1-9]|1[0-2])\/(0[1-9]|[1-2][0-9]|3[0-1])\/[0-9]{4}$/', $_POST['Hire_Date'] === false)) {
                                throw new Exception("Ngày bắt đầu làm việc không hợp lệ");
                            }
                            if (preg_match('/^(0[1-9]|1[0-2])\/(0[1-9]|[1-2][0-9]|3[0-1])\/[0-9]{4}$/', $_POST['Birth_Date'] === false)) {
                                throw new Exception("Ngày sinh không hợp lệ");
                            }
                            //delete space and special char in form data
                            $IdAccount = trim($_POST['IdAccount']);
                            $EmployeeID = trim(($_POST['EmployeeID']));
                            $Name = trim($_POST['Name']);
                            $Email = trim($_POST['Email']);
                            $PhoneNum = trim($_POST['PhoneNum']);
                            $Gender = trim($_POST['Gender']);
                            $Hire_Date = $this->reformat_date(trim($_POST['Hire_Date']));
                            $Job = trim($_POST['Job']);
                            $Birth_Date = $this->reformat_date(trim($_POST['Birth_Date']));
                            $Department_Number = $this->Department->GetDeptFromName(trim($_POST['Department_Name']));
                            $Username = trim($_POST['Username']);
                            $Password = hash('sha256', trim($_POST['Password']));
                            $edit_result = $this->Employee->UpdateInfoEmployee($IdAccount, $Name, $Email, $PhoneNum, $Username, $Password, $EmployeeID, $Gender, $Hire_Date, $Job, $Birth_Date, $Department_Number[0]); //update profile in User table and GiaoVien table
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
                } else if ($_SESSION["permission"] === "manager") {
                    if (isset($_POST["submit"])) {
                        try {
                            //check empty field
                            if (intval($_POST['IdAccount']) !== intval($IdAccount)) {
                                throw new Exception("ID tài khoản không khớp");
                            }
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
                            if (preg_match('/^[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{4}$/', $_POST['Username']) === false) {
                                throw new Exception("Username không hợp lệ");
                            }
                            if (preg_match('/^[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{4}$/', $_POST['EmployeeID']) === false) {
                                throw new Exception("ID Nhân viên không hợp lệ");
                            }
                            if (preg_match('/^0[1-9]{1}[0-9]{8}$/', $_POST['PhoneNum'] === false)) {
                                throw new Exception("Số điện thoại không hợp lệ");
                            }
                            if (preg_match('/^(0[1-9]|1[0-2])\/(0[1-9]|[1-2][0-9]|3[0-1])\/[0-9]{4}$/', $_POST['Hire_Date'] === false)) {
                                throw new Exception("Ngày bắt đầu làm việc không hợp lệ");
                            }
                            if (preg_match('/^(0[1-9]|1[0-2])\/(0[1-9]|[1-2][0-9]|3[0-1])\/[0-9]{4}$/', $_POST['Birth_Date'] === false)) {
                                throw new Exception("Ngày sinh không hợp lệ");
                            }
                            //delete space and special char in form data
                            $IdAccount = trim($_POST['IdAccount']);
                            $EmployeeID = trim(($_POST['EmployeeID']));
                            $Name = trim($_POST['Name']);
                            $Email = trim($_POST['Email']);
                            $PhoneNum = trim($_POST['PhoneNum']);
                            $Gender = trim($_POST['Gender']);
                            $Hire_Date = $this->reformat_date(trim($_POST['Hire_Date']));
                            $Job = trim($_POST['Job']);
                            $Birth_Date = $this->reformat_date(trim($_POST['Birth_Date']));
                            $Department_Number = $this->Department->GetDeptFromName(trim($_POST['Department_Name']));
                            $Username = trim($_POST['Username']);
                            $Password = hash('sha256', trim($_POST['Password']));
                            $edit_result = $this->Employee->UpdateInfoEmployee($IdAccount, $Name, $Email, $PhoneNum, $Username, $Password, $EmployeeID, $Gender, $Hire_Date, $Job, $Birth_Date, $Department_Number[0]); //update profile in User table and GiaoVien table
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
                        $this->ViewWithPer("edit-user-employee", "manager", [
                            "error_msg" => $error_msg
                        ]);
                        exit();
                    } else {
                        http_response_code(500);
                        header('Location: /page-error-500.html');
                        exit();
                    }
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

    function account($IdAccount)
    {
        if ($this->User->CheckValidAccount($IdAccount) === true) {
            if ($IdAccount === $_SESSION['user_id']) {
                if (isset($_SESSION["permission"])) {
                    if ($_SESSION["permission"] === "admin") {
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
                                if (preg_match('/^[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{4}$/', $_POST['Username']) === false) {
                                    throw new Exception("Username không hợp lệ");
                                }
                                if (preg_match('/^0[1-9]{1}[0-9]{8}$/', $_POST['PhoneNum'] === false)) {
                                    throw new Exception("Số điện thoại không hợp lệ");
                                }
                                //delete space and special char in form data
                                $Email = trim($_POST['Email']);
                                $PhoneNum = trim($_POST['PhoneNum']);
                                $Username = trim($_POST['Username']);
                                $Password = hash('sha256', trim($_POST['Password']));
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
                    } else if ($_SESSION["permission"] === "manager") {
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
                                if (preg_match('/^[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{4}$/', $_POST['Username']) === false) {
                                    throw new Exception("Username không hợp lệ");
                                }
                                if (preg_match('/^0[1-9]{1}[0-9]{8}$/', $_POST['PhoneNum'] === false)) {
                                    throw new Exception("Số điện thoại không hợp lệ");
                                }
                                //delete space and special char in form data
                                $Email = trim($_POST['Email']);
                                $PhoneNum = trim($_POST['PhoneNum']);
                                $Username = trim($_POST['Username']);
                                $Password = hash('sha256', trim($_POST['Password']));
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
                            $this->ViewWithPer("account-setting", "manager", [
                                "error_msg" => $error_msg
                            ]);
                            exit();
                        } else {
                            http_response_code(500);
                            header('Location: /page-error-500.html');
                            exit();
                        }
                    } else if ($_SESSION["permission"] === "employee") {
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
                                if (preg_match('/^[A-Z]{2}[0-9]{2}[A-Z]{2}[0-9]{4}$/', $_POST['Username']) === false) {
                                    throw new Exception("Username không hợp lệ");
                                }
                                if (preg_match('/^0[1-9]{1}[0-9]{8}$/', $_POST['PhoneNum'] === false)) {
                                    throw new Exception("Số điện thoại không hợp lệ");
                                }
                                //delete space and special char in form data
                                $Email = trim($_POST['Email']);
                                $PhoneNum = trim($_POST['PhoneNum']);
                                $Username = trim($_POST['Username']);
                                $Password = hash('sha256', trim($_POST['Password']));
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
                            $this->ViewWithPer("account-setting", "employee", [
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
        if ($this->User->CheckValidForm($IdForm) === true) {
            if (isset($_SESSION["permission"])) {
                if ($_SESSION["permission"] === "manager") {
                    if (isset($_POST["submit"])) {
                        try {
                            //check empty field
                            if (intval($_POST['IdForm']) !== intval($IdForm)) {
                                throw new Exception("ID Đơn không khớp");
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
                            if (preg_match('/^(0[1-9]|1[0-2])\/(0[1-9]|[1-2][0-9]|3[0-1])\/[0-9]{4}$/', $_POST['Start_Date'] === false)) {
                                throw new Exception("Ngày bắt đầu không hợp lệ");
                            }
                            if (preg_match('/^(0[1-9]|1[0-2])\/(0[1-9]|[1-2][0-9]|3[0-1])\/[0-9]{4}$/', $_POST['End_Date'] === false)) {
                                throw new Exception("Ngày kết thúc không hợp lệ");
                            }
                            //delete space and special char in form data
                            $IdAccount_Employess = $_SESSION["user_id"];
                            $IdForm = trim(($_POST['IdForm']));
                            $Start_Date = $this->reformat_date(trim($_POST['Start_Date']));
                            $End_Date = $this->reformat_date(trim($_POST['End_Date']));
                            $Reason = trim($_POST['Reason']);
                            $create_result = $this->Manager->EditLeaDayForm($IdAccount_Employess, $IdForm, $Start_Date, $End_Date, $Reason); //update profile in User table and GiaoVien table
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
                        $this->ViewWithPer("edit-leave-day-form", "employee", [
                            "error_msg" => $error_msg
                        ]);
                        exit();
                    } else {
                        http_response_code(500);
                        header('Location: /page-error-500.html');
                        exit();
                    }
                } else if ($_SESSION["permission"] === "employee") {
                    if (isset($_POST["submit"])) {
                        try {
                            //check empty field
                            if (intval($_POST['IdForm']) !== intval($IdForm)) {
                                throw new Exception("ID Đơn không khớp");
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
                            if (preg_match('/^(0[1-9]|1[0-2])\/(0[1-9]|[1-2][0-9]|3[0-1])\/[0-9]{4}$/', $_POST['Start_Date'] === false)) {
                                throw new Exception("Ngày bắt đầu không hợp lệ");
                            }
                            if (preg_match('/^(0[1-9]|1[0-2])\/(0[1-9]|[1-2][0-9]|3[0-1])\/[0-9]{4}$/', $_POST['End_Date'] === false)) {
                                throw new Exception("Ngày kết thúc không hợp lệ");
                            }
                            //delete space and special char in form data
                            $IdAccount_Employess = $_SESSION["user_id"];
                            $IdForm = trim(($_POST['IdForm']));
                            $Start_Date = $this->reformat_date(trim($_POST['Start_Date']));
                            $End_Date = $this->reformat_date(trim($_POST['End_Date']));
                            $Reason = trim($_POST['Reason']);
                            $create_result = $this->Employee->EditLeaDayForm($IdAccount_Employess, $IdForm, $Start_Date, $End_Date, $Reason); //update profile in User table and GiaoVien table
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
        if ($this->User->CheckValidForm($IdForm) === true) {
            if (isset($_SESSION["permission"])) {
                if ($_SESSION["permission"] === "manager") {
                    if (isset($_POST["submit"])) {
                        try {
                            //check empty field
                            if (intval($_POST['IdForm']) !== intval($IdForm)) {
                                throw new Exception("ID Đơn không khớp");
                            }
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
                            if (preg_match('/^(0[1-9]|1[0-2])\/(0[1-9]|[1-2][0-9]|3[0-1])\/[0-9]{4}$/', $_POST['Start_Date'] === false)) {
                                throw new Exception("Ngày bắt đầu không hợp lệ");
                            }
                            if (preg_match('/^(0[1-9]|1[0-2])\/(0[1-9]|[1-2][0-9]|3[0-1])\/[0-9]{4}$/', $_POST['End_Date'] === false)) {
                                throw new Exception("Ngày kết thúc không hợp lệ");
                            }
                            //delete space and special char in form data
                            $IdAccount_Employess = trim(($_POST['IdAccount']));
                            $IdForm = trim(($_POST['IdForm']));
                            $Start_Date = $this->reformat_date(trim($_POST['Start_Date']));
                            $End_Date = $this->reformat_date(trim($_POST['End_Date']));
                            $Reason = trim($_POST['Reason']);
                            $create_result = $this->Manager->EditLeaDayForm($IdAccount_Employess, $IdForm, $Start_Date, $End_Date, $Reason); //update profile in User table and GiaoVien table
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
                } else if ($_SESSION["permission"] === "admin") {
                    if (isset($_POST["submit"])) {
                        try {
                            //check empty field
                            if (intval($_POST['IdForm']) !== intval($IdForm)) {
                                throw new Exception("ID Đơn không khớp");
                            }
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
                            if (preg_match('/^(0[1-9]|1[0-2])\/(0[1-9]|[1-2][0-9]|3[0-1])\/[0-9]{4}$/', $_POST['Start_Date'] === false)) {
                                throw new Exception("Ngày bắt đầu không hợp lệ");
                            }
                            if (preg_match('/^(0[1-9]|1[0-2])\/(0[1-9]|[1-2][0-9]|3[0-1])\/[0-9]{4}$/', $_POST['End_Date'] === false)) {
                                throw new Exception("Ngày kết thúc không hợp lệ");
                            }
                            //delete space and special char in form data
                            $IdAccount_Employess = trim(($_POST['IdAccount']));
                            $IdForm = trim(($_POST['IdForm']));
                            $Start_Date = $this->reformat_date(trim($_POST['Start_Date']));
                            $End_Date = $this->reformat_date(trim($_POST['End_Date']));
                            $Reason = trim($_POST['Reason']);
                            $create_result = $this->User->EditLeaDayForm($IdAccount_Employess, $IdForm, $Start_Date, $End_Date, $Reason); //update profile in User table and GiaoVien table
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
                        $this->ViewWithPer("edit-department-leave-day-form", "admin", [
                            "error_msg" => $error_msg
                        ]);
                        exit();
                    } else {
                        http_response_code(500);
                        header('Location: /page-error-500.html');
                        exit();
                    }
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