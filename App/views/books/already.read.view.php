<?php

session_start();

if($_SESSION['user_type'] != 'reader')
{
header("location:/");
}


require "views/users/navbar.reader.view.php";