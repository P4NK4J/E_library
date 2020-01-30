<?php

session_start();

if($_SESSION['user_type'] != 'admin')
{
header("location:/");
}