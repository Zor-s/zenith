<?php

// Include database connection class
require_once '../database/database.php';

// Create a new database connection
$database = new Database();
$conn = $database->connect();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $users_id = $_POST['users_id'];
    $task_name = $_POST['task_name'];
    $task_description = $_POST['task_description'];
    $priority = $_POST['priority'];
    $date_start = $_POST['date_start'];
    $date_due = $_POST['date_due'];

    // Prepare the stored procedure call
    $sql = "CALL add_task(:users_id, :task_name, :task_description, :priority, :date_start, :date_due)";

    $stmt = $conn->prepare($sql);

    // Bind parameters to the statement
    $stmt->bindParam(':users_id', $users_id, PDO::PARAM_INT);
    $stmt->bindParam(':task_name', $task_name, PDO::PARAM_STR);
    $stmt->bindParam(':task_description', $task_description, PDO::PARAM_STR);
    $stmt->bindParam(':priority', $priority, PDO::PARAM_STR);
    $stmt->bindParam(':date_start', $date_start, PDO::PARAM_STR);
    $stmt->bindParam(':date_due', $date_due, PDO::PARAM_STR);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>alert('Task created successfully'); window.location.href='../home.php';</script>";

    } else {
        echo "Error adding task.";
    }
}
