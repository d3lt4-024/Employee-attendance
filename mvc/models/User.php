<?php

class User extends Database
{
    public function LoginCheck($username, $password)
    {
        $query = "SELECT * FROM Account WHERE Username = :username AND Password = :password";
        try {
            $statement = $this->connect->prepare($query);
            $statement->bindValue(':username', $username, PDO::PARAM_STR);
            $statement->bindValue(':password', $password, PDO::PARAM_STR);
            $statement->execute();
            $count = $statement->rowCount();
            if ($count > 0) {
                $result = $statement->fetch();
                return $result;
            } else return false;
        } catch (PDOException $e) {
        }
    }

    public function ChangeState($id, $state)
    {
        $query = "UPDATE Account SET State=:state WHERE IdAccount=:id";
        try {
            $statement = $this->connect->prepare($query);
            $statement->bindValue(':state', $state, PDO::PARAM_STR);
            $statement->bindValue(':id', $id, PDO::PARAM_STR);
            if ($statement->execute()) {
                return true;
            } else return false;
        } catch (PDOException $e) {
        }
    }

    public function GetInfoUserByID($id) //check if user exist in database
    {
        $query = "SELECT Name, Email, PhoneNum, Username, Password, State FROM Account WHERE IdAccount = :id";
        try {
            $statement = $this->connect->prepare($query);
            $statement->bindValue(':id', $id, PDO::PARAM_STR);
            $statement->execute();
            $count = $statement->rowCount();
            $result = $statement->fetch();
            if ($count > 0) {
                return $result;
            } else return false;
        } catch (PDOException $e) {
        }
    }

    public function GetAmountAccount()
    {
        $query = "SELECT * FROM Account";
        try {
            $statement = $this->connect->prepare($query);
            $statement->execute();
            $count = $statement->rowCount();
            if ($count > 0) {
                return $count;
            } else return false;
        } catch (PDOException $e) {
        }
    }

    public function GetAmountAccountOnline()
    {
        $query = "SELECT * FROM Account WHERE State='online'";
        try {
            $statement = $this->connect->prepare($query);
            $statement->execute();
            $count = $statement->rowCount();
            if ($count > 0) {
                return $count;
            } else return false;
        } catch (PDOException $e) {
        }
    }

    public function GetAmountAccountOffline()
    {
        $query = "SELECT * FROM Account WHERE State='offline'";
        try {
            $statement = $this->connect->prepare($query);
            $statement->execute();
            $count = $statement->rowCount();
            if ($count > 0) {
                return $count;
            } else return false;
        } catch (PDOException $e) {
        }
    }

    public function GetAccStateForJs()
    {
        $query = "SELECT COUNT(*) AS Amount FROM Account WHERE State='Online' UNION ALL SELECT COUNT(*) AS Amount FROM Account WHERE State='Offline'";
        try {
            $statement = $this->connect->prepare($query);
            $statement->execute();
            $count = $statement->rowCount();
            if ($count > 0) {
                $result = $statement->fetchAll();
                return $result;
            } else return false;
        } catch (PDOException $e) {
        }
    }

    public function GetAllEmpInDept($Department_Number)
    {
        $query = "SELECT IdAccount, Username, Password, Name, Email, PhoneNum, Role, Gender, Hire_Date, Job, Birth_Date, Department_Name FROM Account INNER JOIN Employess E on Account.IdAccount = E.IdAccount_Employess INNER JOIN Department_Manager DM on E.IdAccount_Employess = DM.IdAccount_Employess INNER JOIN Department D on DM.Department_Number = D.Department_Number WHERE D.Department_Number=:dept_num1 UNION SELECT IdAccount, Username, Password, Name, Email, PhoneNum, Role, Gender, Hire_Date, Job, Birth_Date, Department_Name FROM Account INNER JOIN Employess E on Account.IdAccount = E.IdAccount_Employess INNER JOIN Dept_Emp DE on E.IdAccount_Employess = DE.IdAccount_Employess INNER JOIN Department D on DE.Department_Number = D.Department_Number WHERE D.Department_Number=:dept_num2";
        try {
            $statement = $this->connect->prepare($query);
            $statement->bindValue(':dept_num1', $Department_Number, PDO::PARAM_STR);
            $statement->bindValue(':dept_num2', $Department_Number, PDO::PARAM_STR);
            $statement->execute();
            $count = $statement->rowCount();
            $result = $statement->fetchAll();
            if ($count > 0) {
                return $result;
            } else return false;
        } catch (PDOException $e) {
        }
    }

    public function UpdateSettingAccount($IdAccount, $Username, $Password, $PhoneNum, $Email)
    {
        $query1 = "UPDATE Account SET Email=:email, PhoneNum=:phonenum, Username=:username, Password=:password WHERE IdAccount=:id";
        try {
            $statement = $this->connect->prepare($query1);
            $statement->bindValue(':email', $Email, PDO::PARAM_STR);
            $statement->bindValue(':phonenum', $PhoneNum, PDO::PARAM_STR);
            $statement->bindValue(':username', $Username, PDO::PARAM_STR);
            $statement->bindValue(':password', $Password, PDO::PARAM_STR);
            $statement->bindValue(':id', $IdAccount, PDO::PARAM_STR);
            if ($statement->execute()) {
                return true;
            } else return false;
        } catch (PDOException $e) {
        }
    }

    public function GetEmpInDept($Department_Number)
    {
        $query = "SELECT IdAccount, Username, Password, Name, Email, PhoneNum, Role, Gender, Hire_Date, Job, Birth_Date, Department_Name FROM Account INNER JOIN Employess E on Account.IdAccount = E.IdAccount_Employess INNER JOIN Dept_Emp DE on E.IdAccount_Employess = DE.IdAccount_Employess INNER JOIN Department D on DE.Department_Number = D.Department_Number WHERE D.Department_Number=:dept_num";
        try {
            $statement = $this->connect->prepare($query);
            $statement->bindValue(':dept_num', $Department_Number, PDO::PARAM_STR);
            $statement->execute();
            $count = $statement->rowCount();
            $result = $statement->fetchAll();
            if ($count > 0) {
                return $result;
            } else return false;
        } catch (PDOException $e) {
        }
    }

    public function GetLeaDayForm($IdAccount)
    {
        $query = "SELECT * FROM Leave_Day_Form WHERE IdAccount_Employess=:id";
        try {
            $statement = $this->connect->prepare($query);
            $statement->bindValue(':id', $IdAccount, PDO::PARAM_STR);
            $statement->execute();
            $count = $statement->rowCount();
            if ($count > 0) {
                $result = $statement->fetchAll();
                return $result;
            } else return false;
        } catch (PDOException $e) {
        }
    }

    public function GetLeaDayFormWithFormID($IdForm)
    {
        $query = "SELECT * FROM Leave_Day_Form WHERE IdForm=:id_form";
        try {
            $statement = $this->connect->prepare($query);
            $statement->bindValue(':id_form', $IdForm, PDO::PARAM_STR);
            $statement->execute();
            $count = $statement->rowCount();
            if ($count > 0) {
                $result = $statement->fetch();
                return $result;
            } else return false;
        } catch (PDOException $e) {
        }
    }

    public function EditLeaDayForm($IdAccount, $IdForm, $Start_Date, $End_Date, $Reason)
    {
        $query = "UPDATE Leave_Day_Form SET Start_Date=:start_date, End_Date=:end_date, Reason=:reason WHERE IdAccount_Employess=:id AND IdForm=:id_form";
        try {
            $statement = $this->connect->prepare($query);
            $statement->bindValue(':start_date', $Start_Date, PDO::PARAM_STR);
            $statement->bindValue(':end_date', $End_Date, PDO::PARAM_STR);
            $statement->bindValue(':reason', $Reason, PDO::PARAM_STR);
            $statement->bindValue(':id', $IdAccount, PDO::PARAM_STR);
            $statement->bindValue(':id_form', $IdForm, PDO::PARAM_STR);
            if ($statement->execute()) {
                return true;
            } else return false;
        } catch (PDOException $e) {
        }
    }

    public function GetAmountLeaForm()
    {
        $query = "SELECT * FROM Leave_Day_Form";
        try {
            $statement = $this->connect->prepare($query);
            $statement->execute();
            $count = $statement->rowCount();
            if ($count > 0) {
                return $count;
            } else return false;
        } catch (PDOException $e) {
        }
    }

    public function GetAmountLeaFormApp()
    {
        $query = "SELECT * FROM Leave_Day_Form WHERE Form_Status='Approved'";
        try {
            $statement = $this->connect->prepare($query);
            $statement->execute();
            $count = $statement->rowCount();
            if ($count > 0) {
                return $count;
            } else return false;
        } catch (PDOException $e) {
        }
    }

    public function GetAmountLeaFormPen()
    {
        $query = "SELECT * FROM Leave_Day_Form WHERE Form_Status='Pending'";
        try {
            $statement = $this->connect->prepare($query);
            $statement->execute();
            $count = $statement->rowCount();
            if ($count > 0) {
                return $count;
            } else return false;
        } catch (PDOException $e) {
        }
    }

    public function GetFormStatusForJs()
    {
        $query = "SELECT COUNT(*) AS Amount FROM Leave_Day_Form WHERE Form_Status='Approved' UNION ALL SELECT COUNT(*) AS Amount FROM Leave_Day_Form WHERE Form_Status='Pending'";
        try {
            $statement = $this->connect->prepare($query);
            $statement->execute();
            $count = $statement->rowCount();
            if ($count > 0) {
                $result = $statement->fetchAll();
                return $result;
            } else return false;
        } catch (PDOException $e) {
        }
    }

    public function GetUserFromForm($IdForm)
    {
        $query = "SELECT IdAccount_Employess FROM Leave_Day_Form WHERE IdForm=:id_form";
        try {
            $statement = $this->connect->prepare($query);
            $statement->bindValue(':id_form', $IdForm, PDO::PARAM_STR);
            $statement->execute();
            $count = $statement->rowCount();
            if ($count > 0) {
                $result = $statement->fetch();
                return $result;
            } else return false;
        } catch (PDOException $e) {
        }
    }

    public function DeleteForm($IdForm)
    {
        $query = "DELETE FROM Leave_Day_Form WHERE IdForm=:id_form";
        try {
            $statement = $this->connect->prepare($query);
            $statement->bindValue(':id_form', $IdForm, PDO::PARAM_STR);
            if ($statement->execute()) {
                return true;
            } else return false;
        } catch (PDOException $e) {
        }
    }

    public function CreateForm($IdAccount, $IdForm, $Start_Date, $End_Date, $Reason)
    {
        $query = "INSERT INTO Leave_Day_Form (IdAccount_Employess, IdForm, Start_Date, End_Date, Reason) VALUE (:id, :id_form, :start_date, :end_date, :reason)";
        try {
            $statement = $this->connect->prepare($query);
            $statement->bindValue(':id', $IdAccount, PDO::PARAM_STR);
            $statement->bindValue(':id_form', $IdForm, PDO::PARAM_STR);
            $statement->bindValue(':start_date', $Start_Date, PDO::PARAM_STR);
            $statement->bindValue(':end_date', $End_Date, PDO::PARAM_STR);
            $statement->bindValue(':reason', $Reason, PDO::PARAM_STR);
            if ($statement->execute()) {
                return true;
            } else return false;
        } catch (PDOException $e) {
        }
    }

    public function GetListFormDepartment($Department_Number)
    {
        $query = "SELECT E.IdAccount_Employess,IdForm,Employess_Code,Name,Start_Date,End_Date,Reason,Form_Status FROM Account INNER JOIN Employess E on Account.IdAccount = E.IdAccount_Employess INNER JOIN Department_Manager DM on E.IdAccount_Employess = DM.IdAccount_Employess INNER JOIN Department D on DM.Department_Number = D.Department_Number INNER JOIN Leave_Day_Form LDF on E.IdAccount_Employess = LDF.IdAccount_Employess WHERE D.Department_Number=:dept_num1 UNION SELECT E.IdAccount_Employess,IdForm,Employess_Code,Name,Start_Date,End_Date,Reason,Form_Status FROM Account INNER JOIN Employess E on Account.IdAccount = E.IdAccount_Employess INNER JOIN Dept_Emp DE on E.IdAccount_Employess = DE.IdAccount_Employess INNER JOIN Department D on DE.Department_Number = D.Department_Number INNER JOIN Leave_Day_Form LDF on E.IdAccount_Employess = LDF.IdAccount_Employess WHERE D.Department_Number=:dept_num2";
        try {
            $statement = $this->connect->prepare($query);
            $statement->bindValue(':dept_num1', $Department_Number, PDO::PARAM_STR);
            $statement->bindValue(':dept_num2', $Department_Number, PDO::PARAM_STR);
            $statement->execute();
            $count = $statement->rowCount();
            if ($count > 0) {
                $result = $statement->fetchAll();
                return $result;
            } else return false;
        } catch (PDOException $e) {
        }
    }

    public function GetAllForm()
    {
        $query = "SELECT E.IdAccount_Employess,IdForm,Employess_Code,Name,Start_Date,End_Date,Reason,Form_Status FROM Account INNER JOIN Employess E on Account.IdAccount = E.IdAccount_Employess INNER JOIN Department_Manager DM on E.IdAccount_Employess = DM.IdAccount_Employess INNER JOIN Department D on DM.Department_Number = D.Department_Number INNER JOIN Leave_Day_Form LDF on E.IdAccount_Employess = LDF.IdAccount_Employess UNION SELECT E.IdAccount_Employess,IdForm,Employess_Code,Name,Start_Date,End_Date,Reason,Form_Status FROM Account INNER JOIN Employess E on Account.IdAccount = E.IdAccount_Employess INNER JOIN Dept_Emp DE on E.IdAccount_Employess = DE.IdAccount_Employess INNER JOIN Department D on DE.Department_Number = D.Department_Number INNER JOIN Leave_Day_Form LDF on E.IdAccount_Employess = LDF.IdAccount_Employess ORDER BY IdForm ASC";
        try {
            $statement = $this->connect->prepare($query);
            $statement->execute();
            $count = $statement->rowCount();
            if ($count > 0) {
                $result = $statement->fetchAll();
                return $result;
            } else return false;
        } catch (PDOException $e) {
        }
    }

    public function ApproveForm($IdForm)
    {
        $query = "UPDATE Leave_Day_Form SET Form_Status=:status WHERE IdForm=:id_form";
        try {
            $statement = $this->connect->prepare($query);
            $statement->bindValue(':status', "Approved", PDO::PARAM_STR);
            $statement->bindValue(':id_form', $IdForm, PDO::PARAM_STR);
            if ($statement->execute()) {
                return true;
            } else return false;
        } catch (PDOException $e) {
        }
    }

    public function CheckValidDept($Department_Number)
    {
        $query = "SELECT * FROM Department WHERE Department_Number=:dept_num";
        try {
            $statement = $this->connect->prepare($query);
            $statement->bindValue(':dept_num', $Department_Number, PDO::PARAM_STR);
            $statement->execute();
            $count = $statement->rowCount();
            if ($count > 0) {
                return true;
            } else return false;
        } catch (PDOException $e) {
        }
    }

    public function CheckValidForm($IdForm)
    {
        $query = "SELECT * FROM Leave_Day_Form WHERE IdForm=:id_form";
        try {
            $statement = $this->connect->prepare($query);
            $statement->bindValue(':id_form', $IdForm, PDO::PARAM_STR);
            $statement->execute();
            $count = $statement->rowCount();
            if ($count > 0) {
                return true;
            } else return false;
        } catch (PDOException $e) {
        }
    }

    public function GetStatusForm($IdForm)
    {
        $query = "SELECT Form_Status FROM Leave_Day_Form WHERE IdForm=:id_form";
        try {
            $statement = $this->connect->prepare($query);
            $statement->bindValue(':id_form', $IdForm, PDO::PARAM_STR);
            $statement->execute();
            $count = $statement->rowCount();
            if ($count > 0) {
                $result = $statement->fetch();
                return $result;
            } else return false;
        } catch (PDOException $e) {
        }
    }

    public function CheckValidManager($IdAccount)
    {
        $query = "SELECT * FROM Department_Manager WHERE IdAccount_Employess=:id";
        try {
            $statement = $this->connect->prepare($query);
            $statement->bindValue(':id', $IdAccount, PDO::PARAM_STR);
            $statement->execute();
            $count = $statement->rowCount();
            if ($count > 0) {
                return true;
            } else return false;
        } catch (PDOException $e) {
        }
    }

    public function CheckValidEmployee($IdAccount)
    {
        $query = "SELECT * FROM Dept_Emp WHERE IdAccount_Employess=:id";
        try {
            $statement = $this->connect->prepare($query);
            $statement->bindValue(':id', $IdAccount, PDO::PARAM_STR);
            $statement->execute();
            $count = $statement->rowCount();
            if ($count > 0) {
                return true;
            } else return false;
        } catch (PDOException $e) {
        }
    }

    public function CheckValidAccount($IdAccount)
    {
        $query = "SELECT * FROM Account WHERE IdAccount=:id";
        try {
            $statement = $this->connect->prepare($query);
            $statement->bindValue(':id', $IdAccount, PDO::PARAM_STR);
            $statement->execute();
            $count = $statement->rowCount();
            if ($count > 0) {
                return true;
            } else return false;
        } catch (PDOException $e) {
        }
    }
}

?>
