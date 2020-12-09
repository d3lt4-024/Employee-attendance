<?php

class home extends Controller
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
        if (isset($_SESSION['permission'])) {
            if ($_SESSION['permission'] === "manager") {
                $Month = date('m');
                $Year = date('Y');
                $Start_Day = date('Y-m-01');
                $End_Day = date('Y-m-t');
                $user_info = $this->Manager->GetManagerWithId($_SESSION['user_id']);
                $list_form = $this->Leave_Day_Form->GetLeaDayForm($_SESSION['user_id']);
                $department_list_form = $this->Leave_Day_Form->GetListFormDepartment($user_info[0]["Department_Number"]);
                $department_list_form_amount = $this->Leave_Day_Form->GetTotalAmountFormDepartment($user_info[0]["Department_Number"]);
                $department_list_form_approve_amount = $this->Leave_Day_Form->GetApprovedAmountFormDepartment($user_info[0]["Department_Number"]);
                $department_list_form_pending_amount = $this->Leave_Day_Form->GetPendingAmountFormDepartment($user_info[0]["Department_Number"]);
                $salary = $this->Manager->GetSalary($_SESSION['user_id'], $Month, $Year);
                $all_approve_form_in_month = $this->Leave_Day_Form->GetStartEndApproveForm($_SESSION['user_id'], $Start_Day, $End_Day);
                $leave_day_approve_in_month = 0;
                foreach ($all_approve_form_in_month as $key => $value) {
                    $start_date = date_create($value["Start_Date"]);
                    $end_date = date_create($value['End_Date']);
                    $diff = date_diff($start_date, $end_date);
                    $leave_day_approve_in_month += intval($diff->format("%a"));
                }
                $this->ViewWithPer("home", "manager", [
                    "user_info" => $user_info,
                    "list_form" => $list_form,
                    "department_list_form" => $department_list_form,
                    "total_amount" => $department_list_form_amount,
                    "approve_amount" => $department_list_form_approve_amount,
                    "pending_amount" => $department_list_form_pending_amount,
                    "salary" => $salary,
                    "leave_day_in_month" => $leave_day_approve_in_month
                ]); //if user is Employee
                exit();
            } else if ($_SESSION['permission'] === "employee") {
                $Month = date('m');
                $Year = date('Y');
                $Start_Day = date('Y-m-01');
                $End_Day = date('Y-m-t');
                $user_info = $this->Employee->GetEmployeeWithId($_SESSION['user_id']);
                $list_form = $this->Leave_Day_Form->GetLeaDayForm($_SESSION['user_id']);
                $salary = $this->Employee->GetSalary($_SESSION['user_id'], $Month, $Year);
                $all_approve_form_in_month = $this->Leave_Day_Form->GetStartEndApproveForm($_SESSION['user_id'], $Start_Day, $End_Day);
                $leave_day_approve_in_month = 0;
                foreach ($all_approve_form_in_month as $key => $value) {
                    $start_date = date_create($value["Start_Date"]);
                    $end_date = date_create($value['End_Date']);
                    $diff = date_diff($start_date, $end_date);
                    $leave_day_approve_in_month += intval($diff->format("%a"));
                }
                $this->ViewWithPer("home", "employee", [
                    "user_info" => $user_info,
                    "list_form" => $list_form,
                    "salary" => $salary,
                    "leave_day_in_month" => $leave_day_approve_in_month
                ]); //if user is Employee
                exit();
            } else if ($_SESSION['permission'] === "admin") {
                $user_info = $this->User->GetInfoUserByID($_SESSION['user_id']);
                $amount_account = $this->User->GetAmountAccount();
                $amount_account_online = $this->User->GetAmountAccountOnline();
                $amount_account_offline = $this->User->GetAmountAccountOffline();
                $amount_form = $this->Leave_Day_Form->GetAmountLeaForm();
                $amount_form_app = $this->Leave_Day_Form->GetAmountLeaFormApp();
                $amount_form_pen = $this->Leave_Day_Form->GetAmountLeaFormPen();
                $all_form = $this->Leave_Day_Form->GetAllForm();
                $this->ViewWithPer("home", "admin", [
                    "user_info" => $user_info,
                    "amount_acc" => $amount_account,
                    "amount_acc_onl" => $amount_account_online,
                    "amount_acc_off" => $amount_account_offline,
                    "amount_form" => $amount_form,
                    "amount_form_app" => $amount_form_app,
                    "amount_form_pen" => $amount_form_pen,
                    "all_form" => $all_form
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
    }
}
