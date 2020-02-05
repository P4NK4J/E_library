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
        $this->column = array('id','name');
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
}
