<?php
session_start();

if($_SESSION['user_type'] != 'admin')
{
header("location:/");
}

$list = $app['database']->userList('reader');


require "views/users/readerlist.view.php";