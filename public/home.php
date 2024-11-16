<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once './database/database.php';

$users_id = $_SESSION['users_id'];

$db = new Database();
$conn = $db->connect();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/globals.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');

        * {

            font-family: "Inter", sans-serif;
            color: #0d062d;
        }


        .navbar {
            border-bottom: 2px solid #dbdbdb;
        }

        .navbar-custom {
            background-color: #ffffff !important;
        }

        #sidebar {
            position: absolute;
            top: 0;
            left: 0;
        }

        .content {
            /* border: black solid 3px; */
            margin-left: 250px;
            /* margin-right: auto; */
        }

        .zenith-div-scrollable {
            width: 100%;
            height: 320px;
            padding: 10px;
            overflow-y: auto;
        }

        .dropdown-toggle::after {
            display: none !important;
        }
    </style>
</head>

<body>

    <!-- top navbar -->
    <nav class="navbar navbar-expand-sm navbar-light bg-light navbar-custom">
        <div class="container-fluid">
            <img class="navbar-brand" src="images/ZENITHfd.png" alt="logo 2" style="width: 100px; height: auto; margin-inline: 20px;">
            <img class="navbar-brand" src="images/backbutton.svg" alt="logo 2" style="width: 26px; height: 20; margin: 0px; padding: 0px;">
            <img class="navbar-brand" src="images/searchbar.svg" alt="logo 2" style="width: 417px; height: 44; margin-left: 60px; padding: 0px;">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        Welcome,


                        <?php
                        $users_id = $_SESSION['users_id'];

                        $db = new Database();
                        $conn = $db->connect();

                        try {
                            $query = "SELECT username FROM users WHERE users_id = :users_id";
                            $stmt = $conn->prepare($query);
                            $stmt->bindParam(':users_id', $users_id, PDO::PARAM_INT);
                            $stmt->execute();

                            if ($stmt->rowCount() > 0) {
                                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                echo htmlspecialchars($row['username']);
                            } else {
                                echo "User not found.";
                            }
                        } catch (PDOException $e) {
                            echo "Error: " . $e->getMessage();
                        }
                        ?>!
                    </li>

                </ul>
            </div>
        </div>
    </nav>





    <!-- sidebar -->
    <nav id="sidebar" class="flex-column vh-100 p-3 d-flex justify-content-between" style="width: 200px; background-color: rgba(0, 0, 0, 0); border-right: 2px solid #dbdbdb; z-index: 29;">
        <ul class="nav flex-column" style="margin-top: 80px;">
            <li class="nav-item d-flex justify-content-start px-3" style="background-color: var(--primary); border-radius: 10px;">
                <img src="images/homebuttonlight.svg">
                <a class="nav-link text-light" href="home.php">Home</a>
            </li>
            <li class="nav-item d-flex justify-content-start px-3">
                <img src="images/taskbutton.svg">
                <a class="nav-link text-dark" href="tasks.php">Tasks</a>
            </li>
            <li class="nav-item d-flex justify-content-start px-3">
                <img src="images/settingsbutton.svg">
                <a class="nav-link text-dark" href="settings.php">Settings</a>
            </li>
        </ul>


        <div>
            <hr>
            <?php

            // Check if the logout button is clicked
            if (isset($_POST['logout'])) {
                session_unset();
                session_destroy();
                header("Location: index.php");
                exit();
            }
            ?>
            <div class="d-flex justify-content-center align-items-center">
                <form method="POST">
                    <button type="submit" name="logout" style="background: none; border: none; cursor: pointer; display: flex; align-items: center;">
                        <img style="height: 34px; width: 34px; margin-right: 5px;" src="images/logoutbutton.png" alt="">
                        <p style="margin: 0; padding: 0;">LOG OUT</p>
                    </button>
                </form>
            </div>

        </div>
    </nav>

    <!-- contents -->
    <div class="content mt-5">

        <h1>Dashboard</h1>

        <div class="d-flex justify-content-start mt-5">

            <!-- div1 -->
            <div style="height: 450px; width: 325px; background-color: var(--div); border-top-left-radius: 20px; border-top-right-radius: 20px; margin-right: 30px; padding: 20px;">

                <div class="d-flex justify-content-between">
                    <div class="d-flex justify-content-start align-items-center">
                        <div style="width: 10px; height: 10px; background-color: #5030e5; border-radius: 50%; margin-right: 10px;"></div>
                        <h2 style="margin: 0px; padding: 0px;">Today’s Tasks</h2>
                        <div class="d-flex justify-content-center align-items-center" style="width: 25px; height: 25px; background-color: #e0e0e0; border-radius: 50%; margin-left: 5px;">
                            <p id="today-task" style="margin: 0px; padding: 0px;"></p>
                        </div>
                    </div>
                    <button style="margin: 0px; padding: 0px; border: none;" data-bs-toggle="modal" data-bs-target="#addTaskModal">
                        <img src="images/addtask.svg" style="width: 30px; height: auto;"
                            onmouseover="this.style.filter='brightness(50%)'" onmouseout="this.style.filter='brightness(100%)'">
                    </button>
                </div>
                <div style="width: 100%; height: 5px; background-color: #5030e5; margin-block: 30px;"></div>

                <div class="zenith-div-scrollable">
                    <?php require './php/load_todays_task.php';

                    ?>
                </div>
            </div>















            <!-- div2 -->
            <div style="height: 450px; width: 325px; background-color: var(--div); border-top-left-radius: 20px; border-top-right-radius: 20px; margin-right: 30px; padding: 20px;">

                <div class="d-flex justify-content-start align-items-center">
                    <div style="width: 10px; height: 10px; background-color: #ffa500; border-radius: 50%; margin-right: 10px;"></div>
                    <h2 style="margin: 0px; padding: 0px;">Upcoming Tasks</h2>
                    <div class="d-flex justify-content-center align-items-center" style="width: 25px; height: 25px; background-color: #e0e0e0; border-radius: 50%; margin-left: 5px;">
                        <p id="upcoming-task" style="margin: 0px; padding: 0px;"></p>
                    </div>
                </div>

                <div style="width: 100%; height: 5px; background-color: #ffa500; margin-block: 30px;"></div>

                <div class="zenith-div-scrollable">

                    <?php require './php/load_upcoming_task.php';

                    ?>

                </div>
            </div>












            <!-- div3 -->
            <div style="height: 450px; width: 325px; background-color: var(--div); border-top-left-radius: 20px; border-top-right-radius: 20px; margin-right: 30px; padding: 20px;">

                <div class="d-flex justify-content-start align-items-center">
                    <div style="width: 10px; height: 10px; background-color: #8bc48a; border-radius: 50%; margin-right: 10px;"></div>
                    <h2 style="margin: 0px; padding: 0px;">Done</h2>
                    <div class="d-flex justify-content-center align-items-center" style="width: 25px; height: 25px; background-color: #e0e0e0; border-radius: 50%; margin-left: 5px;">
                        <p id="done-task" style="margin: 0px; padding: 0px;"></p>
                    </div>
                </div>
                <div style="width: 100%; height: 5px; background-color: #8bc48a; margin-block: 30px;"></div>

                <div class="zenith-div-scrollable">

                    <?php require './php/load_done_task.php';

                    ?>
                </div>
            </div>
        </div>
    </div>

















    <!-- Add task modal-->
    <div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTaskModalLabel">Add New Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="./php/add_task.php" method="post" id="taskForm">

                        <!-- Hidden input for user ID -->
                        <input type="hidden" name="users_id" value="<?php echo $_SESSION['users_id']; ?>">

                        <div class="mb-3">
                            <label for="task_name" class="form-label">Task Name</label>
                            <input type="text" class="form-control" id="task_name" name="task_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="task_description" class="form-label">Task Description</label>
                            <textarea class="form-control" id="task_description" name="task_description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="priority" class="form-label">Priority</label>
                            <select class="form-select" id="priority" name="priority">
                                <option value="high">High</option>
                                <option value="medium">Medium</option>
                                <option value="low">Low</option>
                            </select>
                        </div>
                        <!-- <div class="mb-3">
                            <label for="date_start" class="form-label">Start Date</label>
                            <input type="datetime-local" class="form-control" id="date_start" name="date_start">
                        </div> -->


                        <div class="mb-3" style="display: none;">
                            <input type="hidden" id="date_start" name="date_start" value="">
                        </div>

                        <div class="mb-3">
                            <label for="date_due" class="form-label">Due Date</label>
                            <input type="datetime-local" class="form-control" id="date_due" name="date_due">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="saveTaskButton" form="taskForm">Save Task</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function markAsDone(taskId) {
            fetch('./php/mark_done.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: 'task_id=' + taskId
                })
                .then(response => response.text())
                .then(data => {
                    if (data === 'success') {
                        window.location.href = './home.php';
                    } else {
                        alert('Failed to mark as done.');
                    }
                })
                .catch(error => console.error('Error:', error));
        }



        // div checker
        window.addEventListener('load', function() {
            const taskDivs = document.querySelectorAll('[id^="done-task-"]');
            const taskCount = taskDivs.length;

            const taskP = document.getElementById('done-task');
            if (taskP) {
                taskP.textContent = `${taskCount}`;
            }
        });


        window.addEventListener('load', function() {
            const taskDivs = document.querySelectorAll('[id^="today-task-"]');
            const taskCount = taskDivs.length;

            const taskP = document.getElementById('today-task');
            if (taskP) {
                taskP.textContent = `${taskCount}`;
            }
        });

        window.addEventListener('load', function() {
            const taskDivs = document.querySelectorAll('[id^="upcoming-task-"]');
            const taskCount = taskDivs.length;

            const taskP = document.getElementById('upcoming-task');
            if (taskP) {
                taskP.textContent = `${taskCount}`;
            }
        });







        // // overdue checker
        // window.onload = function() {
        //     const currentDate = new Date();

        //     const dateElements = document.querySelectorAll('[id^="date-"]');

        //     dateElements.forEach(function(dateElement) {
        //         const idParts = dateElement.id.split('-');
        //         const index = idParts[1];

        //         const dateString = dateElement.innerText.trim();

        //         const date = new Date(dateString);

        //         if (date < currentDate) {
        //             const dueCheckElement = document.getElementById('due-check-' + index);
        //             if (dueCheckElement) {
        //                 dueCheckElement.innerText = "Overdue";
        //             }
        //         } else {
        //             const dueCheckElement = document.getElementById('due-check-' + index);
        //             if (dueCheckElement) {
        //                 dueCheckElement.innerText = "";
        //             }
        //         }
        //     });
        // };




        const now = new Date();
        const formattedDate = now.toISOString().slice(0, 16);
        document.getElementById('date_start').value = formattedDate;
    </script>

</body>

</html>