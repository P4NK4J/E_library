<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if ($_SESSION['user_type'] != 'admin') {
    header("location:/");
}

if (isset($_POST['add'])) {
    $target_dir = "Resources/Images/";
    $target_file = $target_dir . basename($_FILES["cover_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["cover_image"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    if ($_FILES["cover_image"]["size"] > 1000000) {
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
    } else {

       
        $i = 1;
        $book_cat = [];
        while ($i++ < 15)
         {
             if(isset($_POST[$i-1]))
            array_push($book_cat, $_POST[$i-1]);      
        }  
        
        
        if (move_uploaded_file($_FILES["cover_image"]["tmp_name"], $target_file)) {


            if ($book_id = $app['database_book']->addBook()) {

                

                $app['categories']->addCategories($book_id, $book_cat);

                header('location:/booklist');
            }

            echo "The file " . basename($_FILES["cover_image"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}



