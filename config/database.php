<?php

class Database 
{
    private  $DBHOST = "localhost";
    private  $DBUSER = "root";
    private  $DBNAME = "products";
    private  $DBPASS = "";

    public $conn;

    public function getConnection()
    {
        $this->conn = null;

        try
        {
            $this->conn = new PDO("mysql:host=" . $this->DBHOST . ";dbname=" . $this->DBNAME, $this->DBUSER, $this->DBPASS);
            $this->conn->exec("set names utf8");
        }
        catch (PDOException $exception)
        {
            die('Connection Failed : ' . $exception->getMessage());
        }
        return $this->conn;
    }

    // public function message($content, $status)
    // {
    //     return json_encode(['message' => $content, 'error' => $status]);
    // }
}
?>