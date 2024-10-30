<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks</title>
    <link rel="stylesheet" href="css/globals.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');

        * {

            font-family: "Inter", sans-serif;

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
                        Welcome, Zors!
                    </li>

                </ul>
            </div>
        </div>
    </nav>





    <!-- sidebar -->
    <div class="d-flex">
        <nav id="sidebar" class="flex-column vh-100 p-3 " style="width: 200px; background-color: rgba(0, 0, 0, 0); border-right: 2px solid #dbdbdb; z-index: 29;">
            <ul class="nav flex-column" style="margin-top: 80px;">
                <li class="nav-item d-flex justify-content-start px-3">
                    <img src="images/homebutton.svg">
                    <a class="nav-link text-dark" href="#">Home</a>
                </li>
                <li class="nav-item d-flex justify-content-start px-3" style="background-color: var(--primary); border-radius: 10px;">
                    <img src="images/taskbuttonlight.svg">
                    <a class="nav-link text-light" href="#">Tasks</a>
                </li>
                <li class="nav-item d-flex justify-content-start px-3">
                    <img src="images/settingsbutton.svg">
                    <a class="nav-link text-dark" href="#">Settings</a>
                </li>

            </ul>
        </nav>

        <!-- contents -->

        <div class="content mt-5">

            <h1>Tasks</h1>

            <div class="d-flex justify-content-center mt-5">

                <!-- div -->
                <div style="height: 450px; width: 1035px; background-color: var(--div); border-radius: 20px; margin-right: 30px; padding: 20px;">

                </div>


            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>