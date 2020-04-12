<?php
// helper function
function redirect($url)
{
    header("Location: $url");
    exit;
}

if (!$_POST['submit']) {
    redirect("../../index.php");
}
