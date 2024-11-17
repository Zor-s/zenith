<?php
require_once './database/database.php';



$database = new Database();
$db = $database->connect();

$today = date('Y-m-d');
$userId = $_SESSION['users_id'];


// Update overdue tasks
$today_time = date('Y-m-d H:i:s');


$updateQuery = "UPDATE tasks 
                SET is_overdue = 1 
                WHERE date_due < :today_time 
                AND is_finished = 0 
                AND users_id = :user_id";
$updateStmt = $db->prepare($updateQuery);
$updateStmt->bindParam(':today_time', $today_time);
$updateStmt->bindParam(':user_id', $userId);
$updateStmt->execute();





$query = "SELECT * FROM tasks 
          WHERE DATE(date_due) <= :today 
          AND is_finished = 0 
          AND users_id = :user_id 
          ORDER BY date_due ASC";

$stmt = $db->prepare($query);
$stmt->bindParam(':today', $today);
$stmt->bindParam(':user_id', $userId);
$stmt->execute();



if ($stmt->rowCount() > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $overdueMessage = ($row['is_overdue'] == 1) ? "Overdue" : "";


        $priority = htmlspecialchars($row['priority']);

        if ($priority == 'high') {
            $priorityStyle = '<div class="d-flex justify-content-center align-items-center mb-2" style="width: 45px; height: 35px; background-color: #ffdfdf; border-radius: 5px;">
                                <p style="margin: 0px; padding: 0px; color: #ff0000;">High</p>
                              </div>';
        } elseif ($priority == 'medium') {
            $priorityStyle = '<div class="d-flex justify-content-center align-items-center mb-2" style="width: 70px; height: 35px; background-color: #ffffc3; border-radius: 5px;">
                                <p style="margin: 0px; padding: 0px; color: #aaaa00;">Medium</p>
                              </div>';
        } else {
            $priorityStyle = '<div class="d-flex justify-content-center align-items-center mb-2" style="width: 43px; height: 35px; background-color: #f9eee3; border-radius: 5px;">
                                <p style="margin: 0px; padding: 0px; color: #d58d49;">Low</p>
                              </div>';
        }




        echo '
        <div id="today-task-' . $row['tasks_id'] . '" class="p-3 my-3" style="width: 100%; height: auto; background-color: #ffffff; border-radius: 20px;">
            <div class="d-flex justify-content-between">
                ' . $priorityStyle . '        

  <div class="dropdown">
    <button class="dropdown-toggle" style="font-weight: 900; border: none; background: none; padding-right: 0;" data-bs-toggle="dropdown" aria-expanded="false">
        ...
    </button>
    <ul class="dropdown-menu">
        <li><a class="dropdown-item" href="#" onclick="markAsDone(' . $row['tasks_id'] . ')">Mark as Done</a></li>
    </ul>
    </div>


                </div>
           
            <p id="date-' . $row['tasks_id'] .'" style="margin: 0px; padding: 0px;">' . date("M d, Y h:i A", strtotime($row['date_due'])) . '</p>
            <p id="due-check-' . $row['tasks_id'] .'" style="color: red; margin: 0px; padding: 0px;">' . $overdueMessage . '</p>
            <h3 style="font-weight: bold;   margin: 0px;">' . htmlspecialchars($row['task_name']) . '</h3>
            <p style="color: #787486;">' . htmlspecialchars($row['task_description']) . '</p>
        </div>';
    }
} else {
    echo "No tasks are due today.";
}
