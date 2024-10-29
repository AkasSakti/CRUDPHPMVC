<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
define('BASE_URL', 'http://localhost/phpmvc');
// Load files
require_once __DIR__ . '/../model/Database.php';
require_once __DIR__ . '/../model/UserModel.php';
require_once __DIR__ . '/../controller/UserController.php';

// Inisialisasi UserController
$userController = new UserController();

// Debug untuk melihat data POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    error_log("POST Data: " . print_r($_POST, true));
}

// Cek action dari form
if (isset($_POST['action'])) {
    try {
        switch ($_POST['action']) {
            case 'create':
                $result = $userController->createUser(
                    $_POST['nim'],
                    $_POST['nama'],
                    $_POST['email'],
                    $_POST['password']
                );
                
                if ($result) {
                    error_log("User created successfully");
                } else {
                    error_log("Failed to create user");
                }
                break;

            case 'update':
                $result = $userController->updateUser(
                    $_POST['id'],
                    $_POST['nim'],
                    $_POST['nama'],
                    $_POST['email'],
                    $_POST['password']
                );
                
                if ($result) {
                    error_log("User updated successfully");
                } else {
                    error_log("Failed to update user");
                }
                break;

            case 'delete':
                $result = $userController->deleteUser($_POST['id']);
                
                if ($result) {
                    error_log("User deleted successfully");
                } else {
                    error_log("Failed to delete user");
                }
                break;
        }
    } catch (Exception $e) {
        error_log("Error in action {$_POST['action']}: " . $e->getMessage());
        echo "Error: " . $e->getMessage();
    }

    // Redirect untuk mencegah submit ulang
    header('Location: index.php');
    exit;
}

// Tampilkan view
require_once __DIR__ . '/../view/user_view.php';
