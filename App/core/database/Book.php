<?php

class Book extends QueryBuilder
{

    public function __construct($pdo)
    {
        parent::__construct($pdo);
        $this->table = 'books';
        $this->column = array('id', 'name', 'author', 'edition', 'cover_image');
    }

    public function bookList()
    {
        return parent::record($this->table, $this->column);
    }

    public function addBook()
    {
        $values =[];
        $values[0] = "'" . trim($_POST['bookname']) . "'";
        $values[1] = "'" . trim($_POST['author']) . "'";
        $values[2] = "'" . trim($_POST['edition']) . "'";
        $values[3] = "'" . trim(basename($_FILES["cover_image"]["name"])) . "'";
        array_shift($this->column);
        // var_dump($this->column,$values);
        // die();
        $stmt = parent::insert($this->table,$this->column,$values);
        
        $stmt->execute();
        
        $book_id = $this->pdo->lastInsertId();
        return $book_id;
    }
}
