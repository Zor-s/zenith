<?php
require_once '../database/database.php';

$username = $_POST['username'];
$password = $_POST['password'];


$database = new Database();
$conn = $database->connect();

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

$stmt = $conn->prepare("CALL add_user(:username, :password)");
$stmt->bindParam(':username', $username, PDO::PARAM_STR);
$stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);

if ($stmt->execute()) {
    echo "User added successfully!";
} else {
    echo "Error adding user.";
}
