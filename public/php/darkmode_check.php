<?php
$user_id = $_SESSION['users_id'] ?? null; 

$stylesheet = "css/globals.css"; 

if ($user_id) {
    try {
        $database = new Database();
        $conn = $database->connect();

        $stmt = $conn->prepare("SELECT is_darkmode FROM users WHERE users_id = :user_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && $user['is_darkmode'] == 1) {  
            $stylesheet = "css/globals_dark.css"; 
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage(); 
    }
}

