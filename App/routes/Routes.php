<?php
$router->define([

    '' => 'controller/authentication/LoginController.php',

    'logout' => 'controller/authentication/LogoutController.php',

    'signup' => 'controller/authentication/SignupController.php',

    'verify' => 'controller/authentication/VerifyRegistrationController.php',

    'GmailLogin.php' => 'controller/authentication/GmailLoginController.php',

    'books' => 'controller/books/BookController.php',

    'addbook' => 'controller/books/AddBookController.php',

    'edit' => 'controller/books/EditBookController.php',

    'admin' => 'views/users/admin.view.php',

    'reader' => 'views/users/reader.view.php',
    
    'userlist' => 'controller/UserListController.php',

    'login' => 'views/authentication/login.view.php',

    'read' => 'views/books/already.read.view.php',

    'booklist' => 'views/books/list.view.php',

    'activation' => 'controller/authentication/VerifyRegistrationController.php',


]);
