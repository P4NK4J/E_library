<?php

class QueryBuilder
{
    public $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public $column = [];
    public $values = [];

    public function record($table, $column)
    {

        $column = implode(',', $column);

        $statement = $this->pdo->prepare("select {$column} from {$table}");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function select($table, $column, $values, $conditional)
    {
        $column = implode(',', $column);
        $values = implode(',', $values);
        $stmt = $this->pdo->prepare("SELECT ${column} FROM ${table} WHERE ${values} = '${conditional}'");

        return $stmt;
    }

    public function insert($table, $column, $values)
    {
        $column = implode(',', $column);
        $values = implode(',', $values);
        $stmt = $this->pdo->prepare("INSERT INTO $table(${column})  VALUES (${values})");

        return $stmt;
    }

    public function update($table,$update,$check,$hash) {
        $str=',';
        foreach ($update as $key => $value){
            $str=$str.$key."='${value}',";
        }
        $str=trim($str,',');
    $stmt = $this->pdo->prepare("UPDATE ${table} SET ${str} WHERE ${check} ='{$hash}'");
    return $stmt;
    }
}
