<?php

class Dbh
{
    private $host = 'localhost';
    private $name = 'root';
    private $pwd = '';
    private $db = 'todo_app_db';
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->name, $this->pwd, $this->db);
    }

    protected function connect()
    {
        if ($this->conn->connect_errno) {
            die("Connection failed: " . $this->conn->error);
            exit;
        }
        return $this->conn;
    }
}
