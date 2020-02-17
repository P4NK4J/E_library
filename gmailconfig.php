<?php


    //session_start();
    // require_once "Resources/GoogleAPI/vendor/autoload.php";
    $gClient = new Google_Client();
    $gClient->setClientId("368858242936-lhlrf8bpq62sgbo06tkkgpfhplbl02ph.apps.googleusercontent.com");
    $gClient->setClientSecret("Od0ZPjNGOh8uvqR7XzBdi6q6");
    $gClient->setApplicationName("My Project 21920");
    $gClient->setRedirectUri("http://ec2-3-6-32-116.ap-south-1.compute.amazonaws.com/GmailLogin.php");// GmailLogin.php is defined in Routes.php
    $gClient->addScope("email");
    $gClient->addScope("profile");





?>