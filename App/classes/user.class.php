<?php
require_once("db.class.php");
class User extends Dbh
{
    // Class Properties(Variables)
    private $firstname, $lastname, $email, $password;

    // Class methods(Functions)
    public function addUser($_fname, $_lname, $_email, $_password)
    {
        $this->firstname    = $this->cleanInput($_fname);
        $this->lastname     = $this->cleanInput($_lname);
        $this->email        = $this->cleanInput($_email);
        $this->password     = $this->cleanInput($_password);

        $sql = "INSERT INTO users(firstname, lastname, email, password) VALUES(?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bind_param("ssss", $this->firstname, $this->lastname, $this->email, $this->password);
        $stmt->execute();
    }

    public function fetchUser($id)
    {
    }

    public function fetchAllUsers()
    {
    }

    public function deleteUser($id)
    {
    }

    public function editUser($id, $properties)
    {
    }

    // helper functions

    private function cleanInput($input)
    {
        $input = trim($input);
        $input = htmlspecialchars($input);
        $input = stripslashes($input);
        $input = $this->connect()->real_escape_string($input);
        return $input;
    }
}
