<?php

class DbConfig{

    public $conn;
    public $host = "localhost";
    public $dbUser = "postgres";
    public $dbPass = "pass";
    public $dbName = "test_project_db";


    public function __construct(){
        $this->db_connect();
    }

    public function db_connect()
    {
        try {
            $this->conn = new PDO("pgsql:host=$this->host; dbname=$this->dbName", "$this->dbUser", "$this->dbPass");
        } catch (PDOException $e) {
            echo $e->getMessage();

        }
    }
}


?>