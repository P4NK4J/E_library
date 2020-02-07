<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SESSION['user_type'] != 'admin') {
    header('location:/');
}


$result = $app['categories']->addCat($_POST['catname']);

    
    $result->execute();
    header('location:/category_list');
    exit;

?>