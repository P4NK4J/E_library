<?php
class Categories extends QueryBuilder
{
    public function __construct($pdo)
    {
        parent::__construct($pdo);
        $this->table = 'categories';
        $this->column = array('name');
    }

    public function categoryList()
    {
        $this->column = array('id','name','date_added');
        return parent::record($this->table, $this->column);
    }

    public function addCategories($book_id, $categories)
    {
        $this->column = array('book_id', 'category_id');

        foreach ($categories as $category) : 
                $this->values = ["'${book_id}'", "'${category}'"];
                $result = parent::insert('bridge', $this->column, $this->values);

                $result->execute();      
        endforeach;
    }
    public function deleteCat($id)
    {
        return parent::deleteAll($this->table, 'id', $id);
    }

    public function addCat($name)
    {   
        $column = array('name');
        $name = "'".$name."'";
        $value = array($name);
        return parent::insert($this->table,$column,$value);
    }

    public function selectCat($id)
    {
        $this->values = array('id');
        return parent::select($this->table, $this->column, $this->values, $id);
    }
}

