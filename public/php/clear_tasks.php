<?php
require_once '../database/database.php'; // Assuming your connector is in db_connector.php

$db = new Database();
$conn = $db->connect();

try {
    $conn->exec("TRUNCATE TABLE tasks");
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage(); 
}
?>