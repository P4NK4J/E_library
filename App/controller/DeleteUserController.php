<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SESSION['user_type'] != 'admin') {
    header('location:/');
}
$stmt = $app['database']->selectUser($_GET['id']);

$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$delete = $app['database']->deleteUser($_GET['id']);

    
    $delete->execute();
    header('location:/userlist');
    exit;

