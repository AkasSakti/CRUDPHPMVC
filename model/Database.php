<?php

class Database extends PDO{
   /* private $host = "localhost";
    private $db_name = "cobaan";
    private $username = "root";
    private $password = "";
    private $conn = null;
*/
    public function __construct() {
        try {
            error_log("Initializing database connection");
            parent::__construct(
                "mysql:host=localhost;dbname=cobaan",
                "root",
                ""
            );
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            error_log("Database connection successful");
        } catch(PDOException $e) {
            error_log("Connection failed: " . $e->getMessage());
            throw $e;
        }
    }

    /*public function getConnection() {
        try {
            if ($this->conn === null) {
                $this->conn = new PDO(
                    "mysql:host=" . $this->host . ";dbname=" . $this->db_name,
                    $this->username,
                    $this->password
                );
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            }
            return $this->conn;
        } catch(PDOException $e) {
            error_log("Connection Error: " . $e->getMessage());
            throw new Exception("Database connection failed: " . $e->getMessage());
        }
    }
        */
}