<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_SESSION['loggedin']) == true) {
    if ($_SESSION['user_type'] == 'reader') {
        header("location:/reader");
    } else if ($_SESSION['user_type'] == 'admin') {
        header("location:/admin");
    } 
} 



if (isset($_POST['login'])) {

    $app['database']->userLogin($_POST['email'], $_POST['password']);
} else {
    return "please try again later";
}
