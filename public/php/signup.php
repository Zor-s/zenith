<?php
require_once '../database/database.php';

$username = $_POST['username'];
$password = $_POST['password'];

$database = new Database();
$conn = $database->connect();

// Check if the username already exists
$checkStmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE username = :username");
$checkStmt->bindParam(':username', $username, PDO::PARAM_STR);
$checkStmt->execute();

if ($checkStmt->fetchColumn() > 0) {
    echo "<script>alert('Username already exisits.'); window.location.href='../signup.php';</script>";
} else {
    // Username doesn't exist, proceed to add the user
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("CALL add_user(:username, :password)");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);

    if ($stmt->execute()) {
        header("Location: ../index.php");
    } else {
        echo "Error adding user.";
    }
}
?>