<?php
require_once '../database/database.php'; // Assuming your database class is here

$db = new Database();
$conn = $db->connect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $taskId = $_POST['tasks_id'];
    $taskName = $_POST['task_name'];
    $taskDescription = $_POST['task_description'];
    $priority = $_POST['priority'];
    $dueDate = $_POST['date_due'];

    $stmt = $conn->prepare("UPDATE tasks SET task_name = :task_name, task_description = :task_description, priority = :priority, date_due = :date_due WHERE tasks_id = :tasks_id");

    $stmt->bindParam(':tasks_id', $taskId);
    $stmt->bindParam(':task_name', $taskName);
    $stmt->bindParam(':task_description', $taskDescription);
    $stmt->bindParam(':priority', $priority);
    $stmt->bindParam(':date_due', $dueDate);

    if ($stmt->execute()) {
        echo "Task updated successfully! 😎";
    } else {
        echo "Error updating task 😢";
    }
}
