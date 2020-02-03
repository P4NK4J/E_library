<?php
if (isset($_POST['add']))
{
    
    $app['database_book']->addBook($_POST);
    header("location:/");
}