<?php

namespace App\Model;

class Database
{
    protected $conn;
    public function __construct()
    {
        $this->connect();
    }
    public function connect()
    {
        // Create connection
        $this->conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        // echo "Connected successfully<br>";
    }
}