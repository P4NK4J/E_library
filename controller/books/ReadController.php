<?php
if (session_status() == PHP_SESSION_NONE)
    session_start();

if ($_SESSION['user_type'] != 'reader')
    header("location:/");

    
    
  
if (isset($_SESSION['id'])) {
    $uid = $_SESSION['id'];
    
    if (isset($_GET['bid'])) {
        $bid = $_GET['bid'];
        
        $app['database_book']->readBook($uid, $bid);
        
        header('location:/collection');
    }
}
