<?php
if (isset($_POST['addbook']))
{
    
    header("location:/addbook");
}
require "views/books/list.view.php";