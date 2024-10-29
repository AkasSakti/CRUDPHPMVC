<?php
class UserController {
    private $userModel;

    public function __construct() {
        try {
            // Tidak perlu memanggil getConnection() lagi
            // karena Database class sudah extend PDO
            $this->userModel = new UserModel();
            error_log("UserController constructor called");
        } catch (Exception $e) {
            error_log("Error in UserController constructor: " . $e->getMessage());
            throw $e;
        }
    }
    
    public function getAllUsers() {
        try {
            $users = $this->userModel->getAllUsers();
            return $users;
        } catch (Exception $e) {
            error_log("Failed to get users: " . $e->getMessage());
            return [];
        }
    }
    
    public function createUser($nim, $nama, $email, $password) {
        try {
            // Log data yang diterima
            error_log("Attempting to create user with data:");
            error_log("NIM: " . $nim);
            error_log("Nama: " . $nama);
            error_log("Email: " . $email);

            // Validasi input
            if (empty($nim) || empty($nama) || empty($email) || empty($password)) {
                error_log("Validation failed: Empty fields detected");
                return false;
            }

            // Panggil model untuk insert
            $result = $this->userModel->createUser($nim, $nama, $email, $password);
            
            if ($result) {
                error_log("User creation successful");
                return true;
            } else {
                error_log("User creation failed");
                return false;
            }
        } catch (Exception $e) {
            error_log("Error in createUser: " . $e->getMessage());
            return false;
        }    
    }
    public function updateUser($id_user, $nim, $nama, $email, $password = null) {
        if (empty($id_user) || empty($nim) || empty($nama) || empty($email)) {
            throw new Exception("ID, NIM, Nama, and Email fields are required.");
        }

        return $this->userModel->updateUser($id_user, $nim, $nama, $email, $password);
    }
    
    public function deleteUser($id_user) {
        if (empty($id_user)) {
            throw new Exception("User ID is required.");
        }
        
        return $this->userModel->deleteUser($id_user);
    }
}
