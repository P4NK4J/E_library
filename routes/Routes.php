<?php
$router->define([

    '' => 'views/authentication/login.view.php',

    'logout' => 'controller/authentication/LogoutController.php',

    'signup' => 'controller/authentication/SignupController.php',

    'signup-form' => 'views/authentication/signup.view.php',

    'verify' => 'controller/authentication/VerifyRegistrationController.php',

    'GmailLogin.php' => 'controller/authentication/GmailLoginController.php',

    'books' => 'controller/books/BookController.php',

    'add' =>  'views/books/add.view.php',

    'addbook' => 'controller/books/AddBookController.php',

    'editview' => 'views/books/edit.view.php',

    'edit' => 'controller/books/EditBookController.php',

    'admin' => 'views/users/admin.view.php',

    
    
    'userlist' => 'views/users/readerlist.view.php',

    'login' => 'controller/authentication/LoginController.php',

    'readbyuser' => 'controller/books/ReadController.php',
    
    'unreadbyuser' => 'controller/books/UnreadController.php',

    'readlist' => 'views/books/already.read.view.php',

    'booklist' => 'views/books/modify.view.php',

    'collection' => 'views/books/collection.view.php',

    'activation' => 'controller/authentication/VerifyRegistrationController.php',

    'resetpassword' => 'views/authentication/reset.password.view.php',
    
    'category_list' => 'views/books/category.list.view.php',
    
    'deleteuser' => 'controller/DeleteUserController.php',

    'deletecategory' => 'controller/DeleteCategoryController.php',

    'deletebook' => 'controller/books/DeleteBookController.php',

    'addcat' => 'controller/AddCategoryController.php',
    
    'reset' => 'controller/authentication/ResetPasswordController.php',

    'forgot' => 'controller/authentication/ForgetPasswordController.php',

    'reseterror' => 'views/authentication/reset.error.view.php',

    'message' => 'views/authentication/message.view.php',
    
    'resetmessage' => 'views/authentication/reset.message.view.php',

    'reader' => 'views/users/reader.view.php',

    'verifymsg' => 'views/authentication/verifymsg.view.php',

    'verified' => 'views/authentication/verified.view.php',

]);
