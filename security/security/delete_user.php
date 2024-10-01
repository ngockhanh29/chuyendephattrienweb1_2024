<?php
session_start();
require_once 'models/UserModel.php';
$userModel = new UserModel();

$user = NULL; // Add new user
$id = NULL;

// Kiểm tra xem người dùng đã đăng nhập hay chưa
if (!isset($_SESSION['user_id'])) {
    die('You must be logged in to perform this action.');
}

// Tạo CSRF token nếu chưa có
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); // Tạo token ngẫu nhiên
}

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    // Kiểm tra CSRF token
    if (!isset($_GET['csrf_token']) || $_GET['csrf_token'] !== $_SESSION['csrf_token']) {
        die('Invalid CSRF token');
    }
    
    if ($userModel->canDeleteUser($_SESSION['user_id'], $id)) {
        $userModel->deleteUserById($id); // Xóa người dùng
    } else {
        die('You do not have permission to delete this user.');
    }
}

header('location: list_users.php');
?>
