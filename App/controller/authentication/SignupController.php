<?php

require 'views/authentication/signup.view.php';

$stmt = new Mail($mail);
$stmt->sendMail($hash,$id);
//var_dump($stmt);

if (isset($_POST['signup'])) {
    $app['database']->addUser($_POST['name'], $_POST['email'], $_POST['password']);
} else {
    return "please try again later";
}
