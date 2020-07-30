<?php

class Employee extends User
{
    public function GetAllEmployee()
    {
        $query = "SELECT IdAccount, Username, Password, Name, Email, PhoneNum, Gender, Hire_Date, Job, Birth_Date, Department_Name FROM Account INNER JOIN Employess E on Account.IdAccount = E.IdAccount_Employess INNER JOIN Dept_Emp DE on E.IdAccount_Employess = DE.IdAccount_Employess INNER JOIN Department D on DE.Department_Number = D.Department_Number";
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

    public function GetEmployeeWithId($IdAccount)
    {
        $query = "SELECT IdAccount, Username, Password, Name, Email, PhoneNum, State, Gender, Hire_Date, Job, Birth_Date, Department_Name FROM Account INNER JOIN Employess E on Account.IdAccount = E.IdAccount_Employess INNER JOIN Dept_Emp DE on E.IdAccount_Employess = DE.IdAccount_Employess INNER JOIN Department D on DE.Department_Number = D.Department_Number WHERE IdAccount=:id";
        try {
            $statement = $this->connect->prepare($query);
            $statement->bindValue(':id', $IdAccount, PDO::PARAM_STR);
            $statement->execute();
            $count = $statement->rowCount();
            if ($count > 0) {
                $result = $statement->fetch();
                return $result;
            } else return false;
        } catch (PDOException $e) {
        }
    }

    public function UpdateInfoEmployee($IdAccount, $Name, $Email, $PhoneNum, $Username, $Password, $Employess_Code, $Gender, $Hire_Date, $Job, $Birth_Date, $Department_Number)
    {
        $check = 0;
        $query1 = "UPDATE Account SET Name=:name, Email=:email, PhoneNum=:phonenum, Username=:username, Password=:password WHERE IdAccount=:id";
        try {
            $statement = $this->connect->prepare($query1);
            $statement->bindValue(':name', $Name, PDO::PARAM_STR);
            $statement->bindValue(':email', $Email, PDO::PARAM_STR);
            $statement->bindValue(':phonenum', $PhoneNum, PDO::PARAM_STR);
            $statement->bindValue(':username', $Username, PDO::PARAM_STR);
            $statement->bindValue(':password', $Password, PDO::PARAM_STR);
            $statement->bindValue(':id', $IdAccount, PDO::PARAM_STR);
            if ($statement->execute()) {
                $check = $check + 1;
            } else return false;
        } catch (PDOException $e) {
        }
        $query2 = "UPDATE Employess SET Employess_Code=:employess_code, Gender=:gender, Hire_Date=:hire_date, Job=:job, Birth_Date=:birth_date WHERE IdAccount_Employess=:id";
        try {
            $statement = $this->connect->prepare($query2);
            $statement->bindValue(':employess_code', $Employess_Code, PDO::PARAM_STR);
            $statement->bindValue(':gender', $Gender, PDO::PARAM_STR);
            $statement->bindValue(':hire_date', $Hire_Date, PDO::PARAM_STR);
            $statement->bindValue(':job', $Job, PDO::PARAM_STR);
            $statement->bindValue(':birth_date', $Birth_Date, PDO::PARAM_STR);
            $statement->bindValue(':id', $IdAccount, PDO::PARAM_STR);
            if ($statement->execute()) {
                $check = $check + 1;
            } else return false;
        } catch (PDOException $e) {
        }
        $query3 = "UPDATE Dept_Emp SET Department_Number=:dept_number WHERE IdAccount_Employess=:id";
        try {
            $statement = $this->connect->prepare($query3);
            $statement->bindValue(':dept_number', $Department_Number, PDO::PARAM_STR);
            $statement->bindValue(':id', $IdAccount, PDO::PARAM_STR);
            if ($statement->execute()) {
                $check = $check + 1;
            } else return false;
        } catch (PDOException $e) {
        }
        if ($check === 3) return true;
        else return false;
    }

    public function DeleteEmployee($IdAccount)
    {
        $query = "DELETE FROM Account WHERE IdAccount=:id";
        try {
            $statement = $this->connect->prepare($query);
            $statement->bindValue(':id', $IdAccount, PDO::PARAM_STR);
            if ($statement->execute()) {
                return true;
            } else return false;
        } catch (PDOException $e) {
        }
    }

    public function CreateEmployee($IdAccount, $Name, $Email, $PhoneNum, $Username, $Password, $Employess_Code, $Gender, $Hire_Date, $Job, $Birth_Date, $Department_Number)
    {
        $check = 0;
        $query1 = "INSERT INTO Account (IdAccount, Name, Email, PhoneNum, Username, Password, Role) VALUE (:id, :name, :email, :phonenum, :username, :password, :role)";
        try {
            $statement = $this->connect->prepare($query1);
            $statement->bindValue(':id', $IdAccount, PDO::PARAM_STR);
            $statement->bindValue(':name', $Name, PDO::PARAM_STR);
            $statement->bindValue(':email', $Email, PDO::PARAM_STR);
            $statement->bindValue(':phonenum', $PhoneNum, PDO::PARAM_STR);
            $statement->bindValue(':username', $Username, PDO::PARAM_STR);
            $statement->bindValue(':password', $Password, PDO::PARAM_STR);
            $statement->bindValue(':role', "employee", PDO::PARAM_STR);
            if ($statement->execute()) {
                $check = $check + 1;
            } else return false;
        } catch (PDOException $e) {
        }
        $query2 = "INSERT INTO Employess (IdAccount_Employess, Employess_Code, Gender, Hire_Date, Job, Birth_Date) VALUE (:id, :employess_code, :gender, :hire_date, :job, :birth_date)";
        try {
            $statement = $this->connect->prepare($query2);
            $statement->bindValue(':id', $IdAccount, PDO::PARAM_STR);
            $statement->bindValue(':employess_code', $Employess_Code, PDO::PARAM_STR);
            $statement->bindValue(':gender', $Gender, PDO::PARAM_STR);
            $statement->bindValue(':hire_date', $Hire_Date, PDO::PARAM_STR);
            $statement->bindValue(':job', $Job, PDO::PARAM_STR);
            $statement->bindValue(':birth_date', $Birth_Date, PDO::PARAM_STR);
            if ($statement->execute()) {
                $check = $check + 1;
            } else return false;
        } catch (PDOException $e) {
        }
        $query3 = "INSERT INTO Dept_Emp (IdAccount_Employess, Department_Number) VALUE (:id, :dept_number)";
        try {
            $statement = $this->connect->prepare($query3);
            $statement->bindValue(':id', $IdAccount, PDO::PARAM_STR);
            $statement->bindValue(':dept_number', $Department_Number, PDO::PARAM_STR);
            if ($statement->execute()) {
                $check = $check + 1;
            } else return false;
        } catch (PDOException $e) {
        }
        if ($check === 3) return true;
        else return false;
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

    public function GetSalary($IdAccount_Employess, $Month, $Year)
    {
        $query = "SELECT * FROM Salaries WHERE IdAccount_Employess=:id AND Month=:month AND Year=:year";
        try {
            $statement = $this->connect->prepare($query);
            $statement->bindValue(':id', $IdAccount_Employess, PDO::PARAM_STR);
            $statement->bindValue(':month', $Month, PDO::PARAM_STR);
            $statement->bindValue(':year', $Year, PDO::PARAM_STR);
            $statement->execute();
            $count = $statement->rowCount();
            if ($count > 0) {
                $result = $statement->fetch();
                return $result;
            } else return false;
        } catch (PDOException $e) {
        }
    }

    public function GetStartEndApproveForm($IdAccount_Employess, $Limit1, $Limit2)
    {
        $query = "SELECT Start_Date, End_Date FROM Leave_Day_Form WHERE IdAccount_Employess=:id AND Start_Date >= :limit1 AND End_Date <= :limit2 AND Form_Status='Approved'";
        try {
            $statement = $this->connect->prepare($query);
            $statement->bindValue(':id', $IdAccount_Employess, PDO::PARAM_STR);
            $statement->bindValue(':limit1', $Limit1, PDO::PARAM_STR);
            $statement->bindValue(':limit2', $Limit2, PDO::PARAM_STR);
            $statement->execute();
            $count = $statement->rowCount();
            if ($count > 0) {
                $result = $statement->fetchAll();
                return $result;
            } else return false;
        } catch (PDOException $e) {
        }
    }

    public function GetNetSalry($IdAccount_Employess, $Month, $Year)
    {
        $query = "SELECT Net_Salary FROM Salaries WHERE IdAccount_Employess=:id AND Month=:month AND Year=:year";
        try {
            $statement = $this->connect->prepare($query);
            $statement->bindValue(':id', $IdAccount_Employess, PDO::PARAM_STR);
            $statement->bindValue(':month', $Month, PDO::PARAM_STR);
            $statement->bindValue(':year', $Year, PDO::PARAM_STR);
            $statement->execute();
            $count = $statement->rowCount();
            if ($count > 0) {
                $result = $statement->fetch();
                return $result;
            } else return false;
        } catch (PDOException $e) {
        }
    }

    public function GetYearSalary($IdAccount_Employess, $Year)
    {
        $query = "SELECT CONVERT((Net_Salary-((Net_Salary/DAY(LAST_DAY(CONVERT(CONCAT(Year,'-0',Month,'-','01'),DATE ))))*Unpaid_leave_day)-50000*Late_day), SIGNED) AS Total_Salary FROM Salaries WHERE IdAccount_Employess=:id AND Year=:year ORDER BY Month ASC";
        try {
            $statement = $this->connect->prepare($query);
            $statement->bindValue(':id', $IdAccount_Employess, PDO::PARAM_STR);
            $statement->bindValue(':year', $Year, PDO::PARAM_STR);
            $statement->execute();
            $count = $statement->rowCount();
            if ($count > 0) {
                $result = $statement->fetchAll();
                return $result;
            } else return false;
        } catch (PDOException $e) {
        }
    }
}

?>