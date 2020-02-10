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
        $column = array('id', 'name', 'author', 'edition', 'cover_image', 'date_added');
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


    public function updateBook($bnames, $bvalues, $id)
    {
        $i = 0;
        $update = [];
        while (isset($bnames[$i])) {
            $update += [$bnames[$i] => $bvalues[$i]];
            $i++;
        }
        return (parent::update($this->table, $update, 'id', $id));
    }
    public function fetchCat($book_id)
    {
        $column = array('category_id');
        $this->values = array('book_id');
        return parent::select(' bridge', $column, $this->values, $book_id);
    }

    public function fetchBooks($id)
    {
        $column = array('book_id');
        $this->values = array('user_id');
        return parent::select('userbridge', $column, $this->values, $id);
    }

    public function selectBook($id)
    {   
        
        $this->values = array('id');
        return parent::select($this->table, $this->column, $this->values, $id);
    }

    public function deleteBook($id)
    {
        $this->deleteAllCategories($id);
        return parent::deleteAll($this->table, 'id', $id);
    }

    public function deleteAllCategories($book_id)
    {
        return parent::deleteAll('bridge', 'book_id', $book_id);
    }

    public function readBook($uid, $bid)
    {
        $this->column = array('user_id', 'book_id');
        $user_id = "'" . $uid . "'";
        $book_id = "'" . $bid . "'";
        $this->values = array($user_id, $book_id);
        $insert = parent::insert('userbridge', $this->column, $this->values);
        $insert->execute();
    }
    public function unreadBook($user_id, $book_id)
    {
        $delete = parent::delete('userbridge', 'user_id', $user_id, 'book_id', $book_id);
        $delete->execute();
    }
}
