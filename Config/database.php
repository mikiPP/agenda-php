<?php
class Database
{
  
    // specify your own database credentials
    public  $host = "127.0.0.1";
    public  $db_name = "agenda";
    public  $username = "theUser";
    public  $password = "ThePassword_2";
    public $conn;
  
    // get the database connection
    public function getConnection()
    {
  
        $this->conn = null;
  
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=utf8;", $this->username, $this->password);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>
