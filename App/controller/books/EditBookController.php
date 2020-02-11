<?php
if (session_status() == PHP_SESSION_NONE)
    session_start();

if ($_SESSION['user_type'] != 'admin')
    header("location:/login");

$book_name = $_POST['bookname'];
$author_name = $_POST['author'];
$edition = $_POST['edition'];
$bid = $_POST['bid'];
$bnames = ['name', 'author', 'edition'];
$bvalues = [$book_name, $author_name, $edition];

if (isset($_POST['edit'])) {



    $del = $app['database_book']->deleteAllCategories($bid);
    $del->execute();
    $i = 1;
    $categories = [];
    while ($i++ < 10) {
        if (isset($_POST[$i - 1]))
            array_push($categories, $_POST[$i - 1]);
    }

    $stmt = $app['database_book']->selectBook($bid);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $title = $row['cover_image'];
    $target_dir = "Resources/Images/";
    $target_file = $target_dir . basename($_FILES["cover_image"]["name"]);


    if (!empty($_FILES['cover_image']['name'])) {

        $uploadOk = 1;

        $file_dir = "Resources/Images/" . $title;
        unlink($file_dir);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["cover_image"]["tmp_name"]);
        if ($check !== false) {

            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        $uploadOk = 0;


        if ($_FILES["cover_image"]["size"] > 800000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"

        ) {
            echo "Sorry, only JPG, JPEG, PNG files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        }

        move_uploaded_file($_FILES["cover_image"]["tmp_name"], $target_file); {
            $image = basename($_FILES["cover_image"]["name"]);
            array_push($bnames, 'cover_image');
            array_push($bvalues, $image);
        }
    }


    $book_id = $app['database_book']->updateBook($bnames, $bvalues, $bid);

    if ($book_id->execute()) {
        $stmt = $app['categories']->addCategories($bid, $categories);
        header('location:/booklist');
    }
}
header('location:/booklist');
