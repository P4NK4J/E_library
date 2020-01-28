<?php
require "gmailconfig.php";

$loginUrl = $gClient->createAuthUrl();
require 'views/authentication/login.view.php';



if (isset($_POST['login'])) {

    $app['database']->userLogin($_POST['email'], $_POST['password']);
} else {
    return "please try again later";
}
