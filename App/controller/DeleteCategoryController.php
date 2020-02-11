<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SESSION['user_type'] != 'admin') {
    header('location:/login');
}

$stmt = $app['categories']->selectCat($_GET['id']);




$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$delete = $app['categories']->deleteCat($_GET['id']);


    
    $delete->execute();
    header('location:/category_list');
    exit;

?>