<?php

class Database
{
    public $connect;
    protected $dsn = "mysql:host=localhost:3306;dbname=Demo_DB";
    protected $username = "root";
    protected $password = "Vuphptit@24";

    function __construct()
    {
        try {
            $this->connect = new PDO($this->dsn, $this->username, $this->password);
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }
    }

}

?>
