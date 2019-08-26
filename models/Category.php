<?php

class Category {

    private $conn;
    private $table = 'categories';

    public $id;
    public $name;
    public $created_at;

    public function __construct($db) {

        $this->conn = $db;
    }

    //get categories
    public function read() {
        //create query
        $query = 'SELECT id, name, created_at FROM '.$this->table.' ORDER BY created_at DESC';
        
        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }
}


?>