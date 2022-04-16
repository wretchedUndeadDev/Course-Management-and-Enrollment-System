<?php
include('config.php');

class Database
{
    private $host = 'localhost';
    private $db_name = DB_NAME;
    private $username = 'root';
    private $password = '';
    private $conn;

    // Connect to DB
    public function connect()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                'mysql:host=' . $this->host . ';port=3306;dbname=' . $this->db_name,
                $this->username,
                $this->password
            );
        } catch (PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }

        return $this->conn;
    }
}
