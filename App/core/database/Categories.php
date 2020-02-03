<?php
class Categories extends QueryBuilder
{
    public function __construct($pdo)
    {   
        parent::__construct($pdo);
        $this->table = 'categories';
        $this->column = array('name');
        
    }

    public function cat_names()
    {
        return parent::record($this->table,$this->column);
    }

}
