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
    <link rel="stylesheet" href="<?php require_once "./php/darkmode_check.php";
                                    echo $stylesheet; ?>">

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
            background-color: var(--div) !important;
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
            <img class="navbar-brand" src="
            
                                    <?php
                                    $user_id = $_SESSION['users_id'] ?? null;

                                    $color = "images/zenithfdlight.svg";

                                    if ($user_id) {
                                        try {

                                            $stmt = $conn->prepare("SELECT is_darkmode FROM users WHERE users_id = :user_id");
                                            $stmt->bindParam(':user_id', $user_id);
                                            $stmt->execute();

                                            $user = $stmt->fetch(PDO::FETCH_ASSOC);

                                            if ($user && $user['is_darkmode'] == 1) {
                                                $color = "images/zenithfddark.svg";
                                            }
                                        } catch (PDOException $e) {
                                            echo "Error: " . $e->getMessage();
                                        }
                                    }
                                    echo $color;
                                    ?>
            
            
            " alt="logo 2" style="width: 100px; height: auto; margin-inline: 20px;">
            <!-- <img class="navbar-brand" src="images/backbutton.svg" alt="logo 2" style="width: 26px; height: 20; margin: 0px; padding: 0px;"> -->
            <!-- <img class="navbar-brand" src="images/searchbar.svg" alt="logo 2" style="width: 417px; height: 44; margin-left: 60px; padding: 0px;"> -->

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li style="color: var(--text);" class="nav-item">
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
                <a class="nav-link" style="color: var(--text);" href="home.php"> <img src="images/homebutton.svg">
                    Home</a>
            </li>
            <li class="nav-item d-flex justify-content-start px-3">
                <a class="nav-link" style="color: var(--text);" href="tasks.php"> <img src="images/taskbutton.svg">
                    Tasks</a>
            </li>
            <li class="nav-item d-flex justify-content-start px-3" style="background-color: var(--primary); border-radius: 10px;">
                <a class="nav-link text-light" href="settings.php"> <img src="images/settingsbuttonlight.svg">
                    Settings</a>
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
                        <img style="height: 34px; width: 34px; margin-right: 5px;" src="
                        <?php
                        $user_id = $_SESSION['users_id'] ?? null;

                        $color = "images/logoutbuttonlight.svg";

                        if ($user_id) {
                            try {

                                $stmt = $conn->prepare("SELECT is_darkmode FROM users WHERE users_id = :user_id");
                                $stmt->bindParam(':user_id', $user_id);
                                $stmt->execute();

                                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                                if ($user && $user['is_darkmode'] == 1) {
                                    $color = "images/logoutbuttondark.svg";
                                }
                            } catch (PDOException $e) {
                                echo "Error: " . $e->getMessage();
                            }
                        }
                        echo $color;
                        ?>
                        
                        
                        " alt="">
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
                <div class="d-flex justify-content-evenly align-items-center" style="width: 274px; height: 74px; background-color: var(--text); border-radius: 20px;">
                    <p style="color: var(--div); margin: 0px; padding: 0px; font-size: x-large;">Dark Mode</p>

                    <button id="toggleButton" style="background: none; border: none;">
                        <div id="transitionDiv" class="d-flex justify-content-start align-items-center" style="background-color: var(--div); width: 70px; height: 31px; border-radius: 20px; border-radius: 20px;">
                            <div style="width: 27px; height: 27px; background-color: var(--text); border-radius: 50%; margin-inline: 3px;"></div>
                        </div>
                    </button>
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



        // const toggleButton = document.getElementById("toggleButton");
        // const transitionDiv = document.getElementById("transitionDiv");

        // let alignedStart = true;

        // toggleButton.addEventListener("click", () => {
        //     if (alignedStart) {
        //         transitionDiv.classList.remove("justify-content-start");
        //         transitionDiv.classList.add("justify-content-end");
        //     } else {
        //         transitionDiv.classList.remove("justify-content-end");
        //         transitionDiv.classList.add("justify-content-start");
        //     }
        //     alignedStart = !alignedStart;

        // });





        document.getElementById('toggleButton').addEventListener('click', function() {
            // Send an AJAX request to update the database
            var xhr = new XMLHttpRequest();
            xhr.open('POST', './php/darkmode_set.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    location.reload();
                } else {
                    console.error('Error updating dark mode');
                }
            };
            xhr.send();
        });
    </script>





    <script>
        const toggleButton = document.getElementById("toggleButton");
        const transitionDiv = document.getElementById("transitionDiv");

        let isDarkMode = <?php
                            if (isset($_SESSION['users_id'])) {
                                $user_id = $_SESSION['users_id'];
                                $database = new Database();
                                $conn = $database->connect();
                                $stmt = $conn->prepare("SELECT is_darkmode FROM users WHERE users_id = :user_id");
                                $stmt->bindParam(':user_id', $user_id);
                                $stmt->execute();
                                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                                echo $user['is_darkmode'];
                            } else {
                                echo 0;
                            }
                            ?>;

        function setAlignment() {
            if (isDarkMode == 1) {
                transitionDiv.classList.remove("justify-content-start");
                transitionDiv.classList.add("justify-content-end");
            } else {
                transitionDiv.classList.remove("justify-content-end");
                transitionDiv.classList.add("justify-content-start");
            }
        }

        setAlignment();

        // toggleButton.addEventListener("click", () => {
        //     isDarkMode = (isDarkMode == 1) ? 0 : 1;

        //     setAlignment();

        //     var xhr = new XMLHttpRequest();
        //     xhr.open('POST', 'update_darkmode.php', true);
        //     xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        //     xhr.onload = function() {
        //         if (xhr.status === 200) {
        //             // Success: You might not need to do anything here if 
        //             // you've already updated the UI with setAlignment()
        //         } else {
        //             console.error('Error updating dark mode');
        //         }
        //     };
        //     xhr.send();
        // });
    </script>
</body>

</html>