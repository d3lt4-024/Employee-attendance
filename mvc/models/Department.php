<?php


class Department extends Database
{
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
}