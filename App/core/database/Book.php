<?php

class Book extends QueryBuilder
{

    public function __construct($pdo)
    {
        parent::__construct($pdo);
        $this->table = 'books';
        $this->column = array('id','name','author','edition','cover_image');
    }

    public function Booklist()
    {
        return parent::record($this->table,$this->column);
    }

    public function addBook(){
        $values =[];
        $values[0] = "'" . trim($_POST['name']) . "'";
        $values[1] = "'" . trim($_POST['author']) . "'";
        $values[2] = "'" . trim($_POST['edition']) . "'";
        $values[3] = "'" . trim(basename($_FILES["image"]["name"])) . "'";
        array_shift($this->column);
        $stmt = parent::insert($this->table,$this->column,$values);
        $stmt->execute();
    }


}
