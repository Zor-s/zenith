<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'zenith';
    private $username = 'root';
    private $password = '';
    private $conn;

    // Method to connect to the database
    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection error: " . $e->getMessage();
        }

        return $this->conn;
    }
}



// *****Initialize connection to the database*****

// require_once 'database/database.php';
// $database = new Database();
// $db = $database->connect();

// *****Example query to test the connection*****

// $query = $db->query("SELECT * FROM users");
// $results = $query->fetchAll(PDO::FETCH_ASSOC);

// print_r($results);
