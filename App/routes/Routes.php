<?php
$router->define([

    '' => 'controller/authentication/LoginController.php',

    'logout' => 'controller/authentication/LogoutController.php',

    'signup' => 'controller/authentication/SignupController.php',

    'verify' => 'controller/authentication/VerifyRegistrationController.php',

    'GmailLogin.php' => 'controller/authentication/GmailLoginController.php',

    'books' => 'controller/books/BookController.php',

    'admin' => 'views/users/admin.view.php',

    'reader' => 'views/users/reader.view.php',


]);
