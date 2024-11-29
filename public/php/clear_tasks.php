<?php
session_start();
require_once '../database/database.php'; // Assuming your connector is in db_connector.php

$userId = $_SESSION['users_id']; // Get the logged-in user's ID

$db = new Database();
$conn = $db->connect();

try {
    // Use a prepared statement to safely delete tasks for the current user
    $stmt = $conn->prepare("DELETE FROM tasks WHERE users_id = :user_id");
    $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $stmt->execute();

    echo "All tasks for the user have been deleted.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage(); 
}
?>
