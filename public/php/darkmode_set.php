<?php
session_start(); 
include_once '../database/database.php'; // Replace with your database connection file

if (isset($_SESSION['users_id'])) {
    $user_id = $_SESSION['users_id'];

    try {
        $database = new Database();
        $conn = $database->connect();

        $stmt = $conn->prepare("SELECT is_darkmode FROM users WHERE users_id = :user_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        $newDarkModeValue = ($user['is_darkmode'] == 1) ? 0 : 1;

        $stmt = $conn->prepare("UPDATE users SET is_darkmode = :new_value WHERE users_id = :user_id");
        $stmt->bindParam(':new_value', $newDarkModeValue);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();


    } catch (PDOException $e) {
        http_response_code(500); 
        echo "Error: " . $e->getMessage();
    }
} else {
    http_response_code(401); 
    echo "Unauthorized";
}
?>