<?php
require_once './database/database.php';



$database = new Database();
$db = $database->connect();

$query = "SELECT * FROM tasks WHERE is_finished = 1 AND users_id = :users_id ORDER BY date_due ASC";

$stmt = $db->prepare($query);
$stmt->bindParam(':users_id', $_SESSION['users_id'], PDO::PARAM_INT);
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
        <div id="done-task-' . $row['tasks_id'] . '" class="p-3 my-3" style="width: 100%; height: auto; background-color: var(--div-lighter); border-radius: 20px;">
            <div class="d-flex justify-content-between">
                ' . $priorityStyle . '        




                </div>
           
            <p id="date-' . $row['tasks_id'] . '" style="margin: 0px; padding: 0px;">' . date("M d, Y h:i A", strtotime($row['date_due'])) . '</p>
            <p id="due-check-' . $row['tasks_id'] . '" style="color: red; margin: 0px; padding: 0px;">' . $overdueMessage . '</p>
            <h3 style="font-weight: bold;   margin: 0px;">' . htmlspecialchars($row['task_name']) . '</h3>
            <p style="color: #787486;">' . htmlspecialchars($row['task_description']) . '</p>
        </div>';
    }
} else {
    echo "<p style='color: var(--text)'>No tasks are finished.</p>";
}
