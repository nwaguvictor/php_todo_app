<?php
include_once("../classes/todo.class.php");
$todo = new Todo();
$user = $todo->fetchUser($_SESSION['user']['id']);
$count = $todo->todoCount($_SESSION['user']['id']);
?>

<section class="profile">
    <h2>Your Profile</h2>
    <p>Name: <?= $user->firstname . " " . $user->lastname ?></p>
    <p>Email: <?= $user->email ?></p>
    <p>Active task: <?= $count ?></p>
</section>