<?php

class Departments extends Database
{
//functions get something with something
    //get department number with department_name
    public function GetDeptFromName($Department_Name)
    {
        $query = "SELECT Department_Number FROM Department WHERE Department_Name=:dept_name";
        try {
            $statement = $this->connect->prepare($query);
            $statement->bindValue(':dept_name', $Department_Name, PDO::PARAM_STR);
            $statement->execute();
            $count = $statement->rowCount();
            if ($count > 0) {
                $result = $statement->fetch();
                return $result;
            } else return false;
        } catch (PDOException $e) {
        }
    }

    //get department name with department number
    public function GetDeptFromNum($Department_Number)
    {
        $query = "SELECT Department_Name FROM Department WHERE Department_Number=:dept_num";
        try {
            $statement = $this->connect->prepare($query);
            $statement->bindValue(':dept_num', $Department_Number, PDO::PARAM_STR);
            $statement->execute();
            $count = $statement->rowCount();
            if ($count > 0) {
                $result = $statement->fetch();
                return $result;
            } else return false;
        } catch (PDOException $e) {
        }
    }

    //get all employee and manager in department with department number
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

    //get all employee in department with department number
    public function GetEmpInDept($Department_Number)
    {
        $query = "SELECT IdAccount, Username, Password, Name, Email, PhoneNum, Role, Gender, Hire_Date, Job, Birth_Date, Department_Name FROM Account INNER JOIN Employess E on Account.IdAccount = E.IdAccount_Employess INNER JOIN Dept_Emp DE on E.IdAccount_Employess = DE.IdAccount_Employess INNER JOIN Department D on DE.Department_Number = D.Department_Number WHERE D.Department_Number=:dept_num2";
        try {
            $statement = $this->connect->prepare($query);
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

//functions check valid something
    //check valid department number
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
}

?>