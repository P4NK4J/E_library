<?php
session_start();

if($_SESSION['user_type'] != 'admin')
{
header("location:/");
}

require "views/users/navbar.admin.view.php";
