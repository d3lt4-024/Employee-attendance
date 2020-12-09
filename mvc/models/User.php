<?php

class User extends Database
{
//functions control login, logout and change state
    //check login
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

    //change state from offline to online or online to offline
    //login success: offline to online
    //logout success: online to offline
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

//functions get something with something
    //get info user with id account
    public function GetInfoUserByID($id)
    {
        $query = "SELECT Name, Email, PhoneNum, Username, Password, State FROM Account WHERE IdAccount = :id";
        try {
            $statement = $this->connect->prepare($query);
            $statement->bindValue(':id', $id, PDO::PARAM_STR);
            $statement->execute();
            $count = $statement->rowCount();
            if ($count > 0) {
                $result = $statement->fetch();
                return $result;
            } else return false;
        } catch (PDOException $e) {
        }
    }

//functions get max of something
    //get max account id in db
    public function GetMaxAccountId()
    {
        $query = "SELECT MAX(IdAccount) FROM Account";
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

//functions check valid something
    //check valid account id
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

    //check valid username
    public function CheckValidUsername($Username)
    {
        $query = "SELECT * FROM Account WHERE Username=:username";
        try {
            $statement = $this->connect->prepare($query);
            $statement->bindValue(':username', $Username, PDO::PARAM_STR);
            $statement->execute();
            $count = $statement->rowCount();
            if ($count > 0) {
                return true;
            } else return false;
        } catch (PDOException $e) {
        }
    }

    //check valid email
    public function CheckValidEmail($Email)
    {
        $query = "SELECT * FROM Account WHERE Email=:email";
        try {
            $statement = $this->connect->prepare($query);
            $statement->bindValue(':email', $Email, PDO::PARAM_STR);
            $statement->execute();
            $count = $statement->rowCount();
            if ($count > 0) {
                return true;
            } else return false;
        } catch (PDOException $e) {
        }
    }

//functions get info for api controller
    //get amount account online and offline.
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

//functions edit or update
    //self update info
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

//functions get amount something
    //get amount account in db
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

    //get amount account online in db
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

    //get amount account offline in db
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
}
?>
