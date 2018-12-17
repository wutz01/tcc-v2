<?php
date_default_timezone_set("Asia/Manila");
require('../environment.php');
class Database {

    // specify your own database credentials
    private $environment;
    private $host = "";
    private $db_name = "";
    private $username = "";
    private $password = "";
    public  $conn;

    public function __construct() {
      global $env;
      $this->environment = $env;
      $this->host = 'localhost';
      if ($this->environment === 'production') {
        $this->username = 'u984568706_admin';
        $this->password = 'RxV6QRBmVVam';
        $this->db_name = 'u984568706_tcc';
      } else {
        $this->username = 'root';
        $this->password = '';
        $this->db_name = 'tanauaud_tcc';
      }
    }

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
