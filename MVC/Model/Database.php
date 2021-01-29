<?php
class Database
{
    private $Severname = "localhost";
    private $Username = "root";
    private $Password = "";
    private $DBname = "quanlybanhang";
    public $conn;

    public function __construct()
    {

        if (!$this->conn) {
            $this->connect();
        }
        // echo "<br>Success";
    }

    private function connect()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->Severname;dbname=$this->DBname", $this->Username, $this->Password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            echo "<br>$e->getMessage()";
            die;
        }
    }

    private function disconnect()
    {
        $this->conn = null;
    }

    public function __destruct()
    {
        if ($this->conn) {
            $this->disconnect();
        }
        // echo "<br>Destroy";
    }
}
