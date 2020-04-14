<?php
if (!isset($_POST['submit-todo'])) {
    header("Location: ../dashboard");
    exit;
} else {
    session_start();
    include_once("../classes/todo.class.php");
    $user_id = $_SESSION['user']['id'];

    $todo = new Todo();

    $todo->addTodo($_POST['title'], $_POST['todo'], $_POST['date'], $user_id);
    header('Location: ../dashboard/index.php?pages=todos');
}
