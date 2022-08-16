<?php

class User
{
    // table name definition and database connection
    public $conn;
    public $table_name = "users";

    // object properties
    public $id;
    public $name_user;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // function getAllUsers(){
    //     $stmt = $this->conn->prepare ("SELECT * FROM ".$this->table_name." ORDER BY name_user");
    // }

    function getUser($id){
        $stmt = $this->conn->prepare ("SELECT * FROM ".$this->table_name." WHERE id= ?");
        $stmt->bind_param("i", $this->id);
        $stmt->execute();

        // return $stmt;

        $row = $stmt->fetch_assoc();
        $this->name_user = $row['name_user'];
    }

}
?>