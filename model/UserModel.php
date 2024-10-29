<?php

class UserModel {
    private $db;
    private $table = 'pemakai';

    public function __construct() {
        try {
            error_log("UserModel constructor called");
            $this->db = new Database();
            error_log("Database connection established");
        } catch (Exception $e) {
            error_log("Database connection failed: " . $e->getMessage());
        }
    }

    public function getAllUsers() {
        try {
            $query = "SELECT id_user, nim, nama, email FROM " . $this->table;
            $stmt = $this->db->query($query);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            error_log("Data retrieved: " . print_r($result, true));
            return $result ? $result : [];
        } catch (PDOException $e) {
            error_log("Error getting users: " . $e->getMessage());
            return [];
        }
    }

    public function createUser($nim, $nama, $email, $password) {
        try {
            error_log("Starting createUser in UserModel");
            
            // Log query yang akan dijalankan
            $query = "INSERT INTO " . $this->table . " (nim, nama, email, password) VALUES (:nim, :nama, :email, :password)";
            error_log("Query: " . $query);

            $stmt = $this->db->prepare($query);
            
            $params = [
                ':nim' => $nim,
                ':nama' => $nama,
                ':email' => $email,
                ':password' => password_hash($password, PASSWORD_DEFAULT)
            ];
            
            error_log("Parameters: " . print_r($params, true));
            
            $result = $stmt->execute($params);
            
            if ($result) {
                error_log("Insert successful. Last Insert ID: " . $this->db->lastInsertId());
                return true;
            } else {
                error_log("Insert failed. Error info: " . print_r($stmt->errorInfo(), true));
                return false;
            }
        } catch (PDOException $e) {
            error_log("Database error in createUser: " . $e->getMessage());
            return false;
        }
    }


    public function updateUser($id_user, $nim, $nama, $email, $password = null) {
        try {
            if ($password) {
                $query = "UPDATE " . $this->table . " 
                          SET nim = :nim, nama = :nama, email = :email, password = :password 
                          WHERE id_user = :id_user";
                $stmt = $this->db->prepare($query);
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $params = [
                    ':id_user' => $id_user,
                    ':nim' => $nim,
                    ':nama' => $nama,
                    ':email' => $email,
                    ':password' => $hashedPassword
                ];
            } else {
                $query = "UPDATE " . $this->table . " 
                          SET nim = :nim, nama = :nama, email = :email 
                          WHERE id_user = :id_user";
                $stmt = $this->db->prepare($query);
                $params = [
                    ':id_user' => $id_user,
                    ':nim' => $nim,
                    ':nama' => $nama,
                    ':email' => $email
                ];
            }
            
            return $stmt->execute($params);
        } catch (PDOException $e) {
            error_log("Error updating user: " . $e->getMessage());
            return false;
        }
    }

    public function deleteUser($id_user) {
        try {
            $query = "DELETE FROM " . $this->table . " WHERE id_user = :id_user";
            $stmt = $this->db->prepare($query);
            return $stmt->execute([':id_user' => $id_user]);
        } catch (PDOException $e) {
            error_log("Error deleting user: " . $e->getMessage());
            return false;
        }
    }
}
