<?php
date_default_timezone_set("Asia/Manila");

class Database{

    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "tanauaud_tcc";
    private $username = "root";
    private $password = "";
    public  $conn;

    // get the database connection
    public function getConnection(){
        $this->conn = null;
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
             return $this->conn;
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
    }
}
?>
