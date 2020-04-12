<?php
require_once("db.class.php");
class User extends Dbh
{
    // Class Properties(Variables)
    private $id, $firstname, $lastname, $email, $password;

    // Class methods(Functions)
    public function addUser($_fname, $_lname, $_email, $_password)
    {
        $this->firstname    = $this->cleanInput($_fname);
        $this->lastname     = $this->cleanInput($_lname);
        $this->email        = $this->cleanInput($_email);
        $this->password     = password_hash($this->cleanInput($_password), PASSWORD_DEFAULT);

        $sql = "INSERT INTO users(firstname, lastname, email, password) VALUES(?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bind_param("ssss", $this->firstname, $this->lastname, $this->email, $this->password);
        if ($stmt->execute()) {
        } else {
            // trigger_error("Query Error...", E_USER_ERROR);
            echo "Error: Query Failed... Please Try Again";
            return;
        }
    }

    public function fetchUser($_id)
    {
        $this->id = $this->cleanInput($_id);

        $sql = "SELECT * FROM users WHERE id = '$this->id'";
        if ($result = $this->connect()->query($sql)) {
            return $result->fetch_object();
        } else {
            // trigger_error("Query Error...", E_USER_ERROR);
            echo "Error: Query Failed... Please Try Again";
            return;
        }
    }

    public function fetchAllUsers()
    {
        if ($result = $this->connect()->query("SELECT * FROM users")) {
            while ($rows = $result->fetch_object()) {
                $users[] = $rows;
            }
            return $users;
        } else {
            // trigger_error("Query Error...", E_USER_ERROR);
            echo "Error: Query Failed... Please Try Again";
            return;
        }
    }

    public function deleteUser($_id)
    {
        $this->id = $this->cleanInput($_id);
        $sql = "DELETE FROM users WHERE id = '$this->id'";
        if ($sql) {
            $this->connect()->query($sql);
        } else {
            // trigger_error("Query Failed", E_USER_ERROR);
            echo "Error: Query Failed... Please Try Again";
            return;
        }
    }

    public function updateUser($_id, $_fname, $_lname, $_email, $_password)
    {
        $this->id           = $this->cleanInput($_id);
        $this->firstname    = $this->cleanInput($_fname);
        $this->lastname     = $this->cleanInput($_lname);
        $this->email        = $this->cleanInput($_email);
        $this->password     = password_hash($this->cleanInput($_password), PASSWORD_DEFAULT);

        $sql = "UPDATE users SET firstname = ?, lastname = ?, email = ?, password = ? WHERE id = ?";
        if ($sql) {
            $stmt = $this->connect()->prepare($sql);
            $stmt->bind_param("ssssi", $this->firstname, $this->lastname, $this->email, $this->password, $this->id);
            $stmt->execute();
        }
        return;
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

    // check user before login
    public function userLogin($_email, $_password)
    {
        // Sanitize email and password
        $this->email = $this->cleanInput($_email);
        $this->password = $this->cleanInput($_password);

        $sql = "SELECT * FROM users WHERE email = '$this->email' LIMIT 1";
        $result = $this->connect()->query($sql);
        if ($result->num_rows >= 1) {
            $row = $result->fetch_assoc();
            if (password_verify($this->password, $row['password']) == $row['password']) {
                $_SESSION['user'] = $row;
                return true;
            }
        }
        return;
    }
}
