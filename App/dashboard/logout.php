<?php

if (!isset($_POST['submit'])) {
    header("Location: index.php");
    exit;
} else {
    session_destroy();
    header("Location: ../../index.php");
    exit;
}
