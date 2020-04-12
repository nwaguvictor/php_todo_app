<?php
include_once("../classes/user.class.php");
session_start();
$user = new User();
// $user->addUser("me", "me", "me@gmail,com", 12345);
// helper function
function redirect($url)
{
    header("Location: $url");
    exit;
}



if (!isset($_POST['submit'])) {
    redirect("../../index.php");
} else {
    $email      = $_POST['user-email'];
    $password   = $_POST['user-password'];
    if (empty($email) || empty($password)) {
        redirect("../../index.php?empty");
    } else if (!preg_match('/^[a-zA-Z\d]{2,}@[\w]{2,8}\.[\w]{2,5}$/', $email)) {
        redirect("../../index.php?email=$email");
    } else {
        if (!$user->userLogin($email, $password)) {
            redirect("../../index.php?wrong");
        } else {
            redirect("../dashboard");
        }
    }
}
