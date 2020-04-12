<?php

include_once("../classes/user.class.php");
$user = new User();

// Redirect Function
function redirect($url)
{
    header("Location: $url");
    exit;
}

if (!isset($_POST['submit'])) {
    redirect("../../index.php");
} else {
    $fname  = $_POST['firstname'];
    $lname  = $_POST['lastname'];
    $email  = $_POST['user-email'];
    $pwd    = $_POST['user-password'];
    $cpwd   = $_POST['c-user-password'];

    // Validating user's input
    if (empty($fname) || empty($lname) || empty($email) || empty($pwd) || empty($cpwd)) {
        redirect("../../index.php?empty=fields");
    } else if (!preg_match('/^[\w-]{5,}$/', $pwd) || !preg_match('/^[\w-]{5,}$/', $cpwd)) {
        redirect("../../index.php?password=short");
    } else if ($cpwd !== $pwd) {
        redirect("../../index.php?password=no-match");
    } else {
        // Add User
        if ($user->userRegistration($fname, $lname, $email, $pwd)) {
            redirect("../../index.php?user=success");
        } else {
            redirect("../../index.php?user_email=taken&value=$email");
        }
    }
}
