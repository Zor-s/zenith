<?php
require_once './database/database.php'; 
session_start();
$users_id = $_SESSION['users_id'];

$db = new Database();
$conn = $db->connect();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
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
            <li class="nav-item d-flex justify-content-start px-3">
                <img src="images/homebutton.svg">
                <a class="nav-link text-dark" href="home.php">Home</a>
            </li>
            <li class="nav-item d-flex justify-content-start px-3">
                <img src="images/taskbutton.svg">
                <a class="nav-link text-dark" href="tasks.php">Tasks</a>
            </li>
            <li class="nav-item d-flex justify-content-start px-3" style="background-color: var(--primary); border-radius: 10px;">
                <img src="images/settingsbuttonlight.svg">
                <a class="nav-link text-light" href="settings.php">Settings</a>
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

        <h1>Settings</h1>

        <div class="mt-5">

            <!-- div -->
            <div style="height: 450px; width: 1035px; border-radius: 20px; margin-right: 30px;">
                <div class="d-flex justify-content-evenly align-items-center" style="width: 274px; height: 74px; background-color: #0d062d; border-radius: 20px;">
                    <p class="text-white" style="margin: 0px; padding: 0px; font-size: x-large;">Dark Mode</p>

                    <div class="d-flex justify-content-start align-items-center" style="background-color: #ffffff; width: 70px; height: 31px; border-radius: 20px; border-radius: 20px;">
                        <div style="width: 27px; height: 27px; background-color: #0d062d; border-radius: 50%; margin-left: 3px;"></div>
                    </div>
                </div>
                <button style="background: none; border: none;" onclick="clearTasks()">
                    <p class="mt-3" style="margin: 0px; padding: 0px; font-size: xx-large; font-weight: 500;">Clear Data</p>
                </button>

            </div>



        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function clearTasks() {
            fetch('./php/clear_tasks.php')
                .then(response => {
                    if (response.ok) {
                        window.location.href = './home.php';
                    } else {
                        console.error("Something went wrong! 😫");
                    }
                })
                .catch(error => console.error("Network error! 🤬", error));
        }
    </script>
</body>

</html>