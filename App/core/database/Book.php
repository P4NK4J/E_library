<?php

class Book extends QueryBuilder
{

    public function __construct($pdo)
    {
        parent::__construct($pdo);
        $this->table = 'books';
        $this->column = array('id', 'name', 'author', 'edition', 'cover_image');
    }

    public function Booklist()
    {
        return parent::record($this->table, $this->column);
    }

    public function addBook()
    {
        $values = [];
        $values[0] = "'" . trim($_POST['bookname']) . "'";
        $values[1] = "'" . trim($_POST['author']) . "'";

        $values[2] = "'" . trim($_POST['edition']) . "'";


        $target_dir = "Resources/Images/";
        $target_file = $target_dir . basename($_FILES["cover_image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


        $check = getimagesize($_FILES["cover_image"]["tmp_name"]);
        if ($check !== false) {

            $uploadOk = 1;
        } else {

            $_SESSION['error'] = "Not an image file";
            $uploadOk = 0;
        }


        if (file_exists($target_file)) {
            $_SESSION['error'] = "Sorry, file already exists.";
            $uploadOk = 0;
        }

        if ($_FILES["cover_image"]["size"] > 1000000) {
            $_SESSION['error'] = "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            $_SESSION['error'] = "Sorry, only JPG, JPEG, PNG format allowed.";
            $uploadOk = 0;
        }
     
            if ($uploadOk != 0 && move_uploaded_file($_FILES["cover_image"]["tmp_name"], $target_file)) {
                $values[3] = "'" . trim(basename($_FILES["cover_image"]["name"])) . "'";
            } else {
                $_SESSION['error'] = "Sorry, there was an error uploading your file.";
            }
        

        array_shift($this->column);
        $stmt = parent::insert($this->table, $this->column, $values);
        $stmt->execute();
    }
}
