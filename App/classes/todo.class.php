<?php
include_once("user.class.php");
class Todo extends User
{
    // Properties ($variables)
    private $todo_id, $todo_title, $todo, $todo_date, $user_id;

    // Methods (functions())
    public function addTodo($title, $body, $date, $u_id)
    {
        $this->todo_title   = $this->cleanInput($title);
        $this->todo         = $this->cleanInput($body);
        $this->todo_date    = $this->cleanInput($date);
        $this->user_id      = $this->cleanInput($u_id);

        $sql = "INSERT INTO todos(todo_title, todo, todo_date, user_id) VALUES(?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bind_param("ssss", $this->todo_title, $this->todo, $this->todo_date, $this->user_id);
        if (!$stmt->execute()) {
            echo "Error Adding Todo. Try Again!";
        }
        return true;
    }

    public function getAllTodos($u_id)
    {
        $this->user_id  = $this->cleanInput($u_id);

        $sql = "SELECT * FROM todos WHERE user_id = '$this->user_id'";
        $query = $this->connect()->query($sql);
        if ($query->num_rows > 0) {
            while ($rows = $query->fetch_assoc()) {
                $todos[] = $rows;
            }
            return $todos;
        }
    }

    public function getTodo($user_id, $id)
    {
        $this->user_id  = $this->cleanInput($user_id);
        $this->todo_id  = $this->cleanInput($id);
        $sql = "SELECT * FROM todos WHERE todo_id = '$this->todo_id' AND user_id = '$this->user_id' LIMIT 1";
        $query = $this->connect()->query($sql);
        return $query->fetch_assoc();
    }

    public function updateTodo($id, $title, $body, $date, $u_id)
    {
        $this->todo_id      = $this->cleanInput($id);
        $this->todo_title   = $this->cleanInput($title);
        $this->todo         = $this->cleanInput($body);
        $this->todo_date    = $this->cleanInput($date);
        $this->user_id      = $this->cleanInput($u_id);

        $sql = "UPDATE todos SET todo_title='$this->todo_title', todo='$this->todo', todo_date='$this->todo_date' WHERE todo_id='$this->todo_id' AND user_id='$this->user_id' ";
        $query = $this->connect()->query($sql);
        if (!$query) {
            echo "Process Failed!. Try again!";
        }
        return true;
    }

    public function deleteTodo($user_id, $id)
    {
        $this->user_id      = $this->cleanInput($user_id);
        $this->todo_id = $this->cleanInput($id);
        $sql = "DELETE FROM todos WHERE todo_id='$this->todo_id' AND user_id='$this->user_id'";
        $query = $this->connect()->query($sql);
        if (!$query) {
            echo "Process Failed... Try again";
        }
        return true;
    }
}
