<?php
session_start();
require_once '../database/database.php'; 

$database = new Database();
$conn = $database->connect();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT users_id, password FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['users_id'] = $user['users_id'];
        header("Location: ../home.php");
        exit();
    } else {
        echo "<script>alert('Invalid username or password.'); window.location.href='../index.php';</script>";
    }
    
    
}
?>


