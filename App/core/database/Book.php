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
        $column = array('id', 'name', 'author', 'edition', 'cover_image','date_added');
        return parent::record($this->table, $column);
    }

    public function addBook()
    {
        $values = [];
        $values[0] = "'" . trim($_POST['bookname']) . "'";
        $values[1] = "'" . trim($_POST['author']) . "'";
        $values[2] = "'" . trim($_POST['edition']) . "'";
        $values[3] = "'" . trim(basename($_FILES["cover_image"]["name"])) . "'";
        array_shift($this->column);
        // var_dump($this->column,$values);
        // die();
        $stmt = parent::insert($this->table, $this->column, $values);
        

        
        $stmt->execute();

        $book_id = $this->pdo->lastInsertId();
        return $book_id;
    }

    public function listBookss()
    {
        $stmt = parent::record($this->table, $this->column);
        $this->column = array('category_id');
        $this->values = array('book_id');
        $cat = [];
        foreach ($stmt as $row) :
            $id = $row['id'];
            $stmt = parent::select('bridge', $this->column, $this->values, $id);
            $stmt->execute();
            $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
            array_push($cat, $res);
        endforeach;
        return $cat;
    }

    public function catName($cat_name)
    {
        $this->column = array('name');
        $this->values = array('id');
        $stmt = parent::select('categories', $this->column, $this->values, $cat_name);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
