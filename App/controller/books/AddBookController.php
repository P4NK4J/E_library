<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if ($_SESSION['user_type'] != 'admin') {
        header("location:/");
    }

    if (isset($_POST['addbook'])) {
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

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["cover_image"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        
        } else {
            $i = 1;
            $categories =[];
            while (isset($_POST[$i])) {
                array_push($categories,$_POST[$i]);
                $i++;
            }
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

                    if ($book_id = $app['database_book']->addBook()) {
                    $app['database_book']->addCategories($book_id, $categories);
                        header('location:/booklist');
                    }

                    echo "The file " . basename($_FILES["cover_image"]["name"]) . " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            
        }
    }
    ?>
    <?php
    require 'views/books/add.view.php';
    ?>