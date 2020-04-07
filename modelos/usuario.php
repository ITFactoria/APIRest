<?php
class Usuario
{
    //Connnection instance
    private $connection;

    //Table name
    private $tableName = "usuarios";

    //Object properties
    public $id;
    public $name;
    public $email;
    public $password;

    //Constructor
    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function read()
    {
        #$stmt = ConnectionDB::getConnection()->prepare("SELECT * from $this->tableName");
        $query = "SELECT * from $this->tableName";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        //return $stmt->fetchAll();
        return $stmt;
    }

    public function readById()
    {

        //$query = "SELECT * FROM ". $this->tableName. "p WHERE p.id =?";
        $query = "SELECT p.id, p.name, p.email, p.password FROM " . $this->tableName . " p WHERE p.id =?";

        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // set values to object properties
        if ($row != null) {
            $this->id = $row['id'];
            $this->name = $row['name'];
            $this->email = $row['email'];
            $this->password = $row['password'];
        }


        //return $stmt;
    }
    public function update()
    {
    }
    public function delete()
    {
    }
    public function create()
    {
    }
}
