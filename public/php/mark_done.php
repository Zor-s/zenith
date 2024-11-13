<?php
include '../database/database.php'; // Replace with actual path

// Check if request method is POST and task_id is provided
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['task_id'])) {
    $taskId = intval($_POST['task_id']);

    // Create a database connection
    $database = new Database();
    $conn = $database->connect();

    if ($conn) {
        $query = "UPDATE tasks SET is_finished = 1 WHERE tasks_id = :taskId";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':taskId', $taskId, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo 'success';
        } else {
            echo 'error';
        }
    } else {
        echo 'Connection error';
    }
}
?>
