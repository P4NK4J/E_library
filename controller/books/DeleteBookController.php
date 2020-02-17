<?php
if (session_status() == PHP_SESSION_NONE)
    session_start();

if ($_SESSION['user_type'] != 'admin')
    header("location:/login");

if (isset($_GET['book_id'])) {
    $stmt = $app['database_book']->selectBook($_GET['book_id']);
    $stmt->execute();
    
    
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $title = $row['cover_image'];
    
    $delete = $app['database_book']->deleteBook($_GET['book_id']);
    
    if ($delete->execute()) {
   
        $file_dir = "Resources/Images/" . $title;
        
        unlink($file_dir);
        header('location:/booklist');
        exit;
    }
}
