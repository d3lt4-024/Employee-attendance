<?php


class Leave_Day_Form extends Database
{
//functions check valid something
    //check valid form with form id
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

//functions get something with something
    //get leave day form status with form id
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

    //get user id create form with form id
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

    //get form info from form id
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

    //get leave day form with account id
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

    //get all leave day form with department number
    public function GetListFormDepartment($Department_Number)
    {
        $query = "SELECT E.IdAccount_Employess,Employess_Code,IdForm,Name,Start_Date,End_Date,Reason,Form_Status FROM Account INNER JOIN Employess E on Account.IdAccount = E.IdAccount_Employess INNER JOIN Dept_Emp DE on E.IdAccount_Employess = DE.IdAccount_Employess INNER JOIN Department D on DE.Department_Number = D.Department_Number INNER JOIN Leave_Day_Form LDF on E.IdAccount_Employess = LDF.IdAccount_Employess WHERE D.Department_Number=:dept_num";
        try {
            $statement = $this->connect->prepare($query);
            $statement->bindValue(':dept_num', $Department_Number, PDO::PARAM_STR);
            $statement->execute();
            $count = $statement->rowCount();
            if ($count > 0) {
                $result = $statement->fetchAll();
                return $result;
            } else return false;
        } catch (PDOException $e) {
        }
    }

    //get amount leave day form with department number
    public function GetTotalAmountFormDepartment($Department_Number)
    {
        $query = "SELECT E.IdAccount_Employess,IdForm,Name,Start_Date,End_Date,Reason,Form_Status FROM Account INNER JOIN Employess E on Account.IdAccount = E.IdAccount_Employess INNER JOIN Dept_Emp DE on E.IdAccount_Employess = DE.IdAccount_Employess INNER JOIN Department D on DE.Department_Number = D.Department_Number INNER JOIN Leave_Day_Form LDF on E.IdAccount_Employess = LDF.IdAccount_Employess WHERE D.Department_Number=:dept_num";
        try {
            $statement = $this->connect->prepare($query);
            $statement->bindValue(':dept_num', $Department_Number, PDO::PARAM_STR);
            $statement->execute();
            $count = $statement->rowCount();
            if ($count > 0) {
                return $count;
            } else return false;
        } catch (PDOException $e) {
        }
    }

    //get amount approved leave day form with department number
    public function GetApprovedAmountFormDepartment($Department_Number)
    {
        $query = "SELECT E.IdAccount_Employess,IdForm,Name,Start_Date,End_Date,Reason,Form_Status FROM Account INNER JOIN Employess E on Account.IdAccount = E.IdAccount_Employess INNER JOIN Dept_Emp DE on E.IdAccount_Employess = DE.IdAccount_Employess INNER JOIN Department D on DE.Department_Number = D.Department_Number INNER JOIN Leave_Day_Form LDF on E.IdAccount_Employess = LDF.IdAccount_Employess WHERE D.Department_Number=1 AND Form_Status='Approved'";
        try {
            $statement = $this->connect->prepare($query);
            $statement->bindValue(':dept_num', $Department_Number, PDO::PARAM_STR);
            $statement->execute();
            $count = $statement->rowCount();
            if ($count > 0) {
                return $count;
            } else return false;
        } catch (PDOException $e) {
        }
    }

    //get amount pending leave day form with department number
    public function GetPendingAmountFormDepartment($Department_Number)
    {
        $query = "SELECT E.IdAccount_Employess,IdForm,Name,Start_Date,End_Date,Reason,Form_Status FROM Account INNER JOIN Employess E on Account.IdAccount = E.IdAccount_Employess INNER JOIN Dept_Emp DE on E.IdAccount_Employess = DE.IdAccount_Employess INNER JOIN Department D on DE.Department_Number = D.Department_Number INNER JOIN Leave_Day_Form LDF on E.IdAccount_Employess = LDF.IdAccount_Employess WHERE D.Department_Number=1 AND Form_Status='Pending'";
        try {
            $statement = $this->connect->prepare($query);
            $statement->bindValue(':dept_num', $Department_Number, PDO::PARAM_STR);
            $statement->execute();
            $count = $statement->rowCount();
            if ($count > 0) {
                return $count;
            } else return false;
        } catch (PDOException $e) {
        }
    }

    //get list approved leave day form from start date to end date with account id
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

//functions get max of something
    //get max leave day form id in db
    public function GetMaxFormId()
    {
        $query = "SELECT MAX(IdForm) FROM Leave_Day_Form";
        try {
            $statement = $this->connect->prepare($query);
            $statement->execute();
            $count = $statement->rowCount();
            if ($count > 0) {
                $result = $statement->fetch();
                return $result;
            } else return false;
        } catch (PDOException $e) {
        }
    }

//functions get info for api controller
    //get amount approved and pending leave day form
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

//functions approved
    //approved leave day form
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

//functions create
    //create leave day form
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

//functions delete
    //delete leave day form with id form
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

//functions edit or update
    //edit leave day form info
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

//functions get amount
    //get amount of leave day form in db
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

    //get amount approved leave day form in db
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

    //get amount pending leave day form in db
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

//functions get all
    //get all leave day form
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

}