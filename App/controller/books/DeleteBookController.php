<?php
if (session_status() == PHP_SESSION_NONE)
    session_start();

if ($_SESSION['user_type'] != 'admin')
    header("location:/");

if (isset($_GET['book_id'])) {
    $stmt = $app['database_book']->selectBook($_GET['book_id']);
    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $delete = $app['database_book']->deleteBook($_GET['book_id']);
    if ($delete->execute()) {
        $title = $row['cover_image'];
        $file_dir = "Resources/Images/" . $title;
        unlink($file_dir);
        header('location:/booklist');
        exit;
    }
}
