<?php
    class Database{
        private $host = "localhost";
        private $dbname = "cursophp";
        private $user = "root";
        private $pswd = "";
        public $connection;

        public function getConnection(){

            $this->connection = null;

            try{
                $this->connection = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname, $this->user,$this->pswd);
                $this->connection -> exec("set names utf8");

            }catch(PDOException $pdoException){
                echo "Error: " . $pdoException->getMessage();


            }
            return $this->connection;



            #PDO:(nombre del servicor; nombre bd, usuario, contraseña)
            #$link = new PDO("mysql:host=localhost;dbname=cursophp","root","");
            #$link ->exec("set names utf8");
            #return $link;
        }
    }
?>