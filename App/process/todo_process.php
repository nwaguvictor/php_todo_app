<?php
session_start();
include_once("../classes/todo.class.php");
$user_id = $_SESSION['user']['id'];
$todo = new Todo();

if (!isset($_POST['submit-todo'])) {
    header("Location: ../dashboard");
    exit;
} else {
    $todo->addTodo($_POST['title'], $_POST['todo'], $_POST['date'], $user_id);
    header('Location: ../dashboard/index.php?pages=todos');
}

// Deleting todo

if (isset($_GET['todo_id'])) {
    $todo_id = $_GET['todo_id'];
    $todo->deleteTodo($user_id, $todo_id);
    header("Location: ../dashboard/index.php?pages=todos");
    exit;
}
