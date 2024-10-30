<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
                <li class="nav-item d-flex justify-content-start px-3" style="background-color: var(--primary); border-radius: 10px;">
                    <img src="images/homebuttonlight.svg">
                    <a class="nav-link text-light" href="#">Home</a>
                </li>
                <li class="nav-item d-flex justify-content-start px-3">
                <img src="images/taskbutton.svg">
                    <a class="nav-link text-dark" href="#">Tasks</a>
                </li>
                <li class="nav-item d-flex justify-content-start px-3">
                <img src="images/settingsbutton.svg">
                    <a class="nav-link text-dark" href="#">Settings</a>
                </li>

            </ul>
        </nav>

        <!-- contents -->

        <div class="content mt-5">

            <h1>Dashboard</h1>

            <div class="d-flex justify-content-center mt-5">

                <!-- div1 -->
                <div style="height: 450px; width: 325px; background-color: var(--div); border-top-left-radius: 20px; border-top-right-radius: 20px; margin-right: 30px; padding: 20px;">

                    <div class="d-flex justify-content-between">
                        <div class="d-flex justify-content-start align-items-center">
                            <div style="width: 10px; height: 10px; background-color: #5030e5; border-radius: 50%; margin-right: 10px;"></div>
                            <h2 style="font-size: larger; margin: 0px; padding: 0px;">Today’s Tasks</h2>
                            <div class="d-flex justify-content-center align-items-center" style="width: 25px; height: 25px; background-color: #e0e0e0; border-radius: 50%; margin-left: 5px;">
                                <p style="margin: 0px; padding: 0px;">3</p>
                            </div>
                        </div>
                        <img src="images/addtask.svg" style="width: 24px; height: auto;">
                    </div>
                    <div style="width: 100%; height: 5px; background-color: #5030e5; margin-block: 30px;"></div>

                    <div class="zenith-div-scrollable">
                        <!-- sample div -->
                        <div class="p-3 my-3" style="width: 100%; height: 200px; background-color: #ffffff; border-radius: 20px;">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex justify-content-center align-items-center mb-2" style="width: 45px; height: 35px; background-color: #ffdfdf; border-radius: 5px;">
                                    <p style="margin: 0px; padding: 0px; color: #ff0000;">High</p>
                                </div>
                                <p style="font-weight: 900;">...</p>
                            </div>
                            <h3 style="font-weight: bold; font-size: x-large; margin: 0px;">Brainstorming</h3>
                            <p style="color: #787486;">Brainstorming brings team members' diverse experience into play. </p>
                        </div>
                        <!-- sample div -->
                        <div class="p-3 my-3" style="width: 100%; height: 200px; background-color: #ffffff; border-radius: 20px;">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex justify-content-center align-items-center mb-2" style="width: 70px; height: 35px; background-color: #ffffc3; border-radius: 5px;">
                                    <p style="margin: 0px; padding: 0px; color: #aaaa00;">Medium</p>
                                </div>
                                <p style="font-weight: 900;">...</p>
                            </div>
                            <h3 style="font-weight: bold; font-size: x-large; margin: 0px;">Brainstorming</h3>
                            <p style="color: #787486;">Brainstorming brings team members' diverse experience into play. </p>
                        </div>
                        <!-- sample div -->
                        <div class="p-3 my-3" style="width: 100%; height: 200px; background-color: #ffffff; border-radius: 20px;">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex justify-content-center align-items-center mb-2" style="width: 43px; height: 35px; background-color: #f9eee3; border-radius: 5px;">
                                    <p style="margin: 0px; padding: 0px; color: #d58d49;">Low</p>
                                </div>
                                <p style="font-weight: 900;">...</p>
                            </div>
                            <p style="color: red; margin: 0px; padding: 0px;">Overdue</p>
                            <h3 style="font-weight: bold; font-size: x-large; margin: 0px;">Brainstorming</h3>
                            <p style="color: #787486;">Brainstorming brings team members' diverse experience into play. </p>
                        </div>
                    </div>
                </div>















                <!-- div2 -->
                <div style="height: 450px; width: 325px; background-color: var(--div); border-top-left-radius: 20px; border-top-right-radius: 20px; margin-right: 30px; padding: 20px;">

                        <div class="d-flex justify-content-start align-items-center">
                            <div style="width: 10px; height: 10px; background-color: #ffa500; border-radius: 50%; margin-right: 10px;"></div>
                            <h2 style="font-size: larger; margin: 0px; padding: 0px;">Upcoming Tasks</h2>
                            <div class="d-flex justify-content-center align-items-center" style="width: 25px; height: 25px; background-color: #e0e0e0; border-radius: 50%; margin-left: 5px;">
                                <p style="margin: 0px; padding: 0px;">3</p>
                            </div>
                        </div>

                    <div style="width: 100%; height: 5px; background-color: #ffa500; margin-block: 30px;"></div>

                    <div class="zenith-div-scrollable">
                        <!-- sample div -->
                        <div class="p-3 my-3" style="width: 100%; height: 200px; background-color: #ffffff; border-radius: 20px;">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex justify-content-center align-items-center mb-2" style="width: 45px; height: 35px; background-color: #ffdfdf; border-radius: 5px;">
                                    <p style="margin: 0px; padding: 0px; color: #ff0000;">High</p>
                                </div>
                                <p style="font-weight: 900;">...</p>
                            </div>
                            <h3 style="font-weight: bold; font-size: x-large; margin: 0px;">Brainstorming</h3>
                            <p style="color: #787486;">Brainstorming brings team members' diverse experience into play. </p>
                        </div>
                        <!-- sample div -->
                        <div class="p-3 my-3" style="width: 100%; height: 200px; background-color: #ffffff; border-radius: 20px;">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex justify-content-center align-items-center mb-2" style="width: 70px; height: 35px; background-color: #ffffc3; border-radius: 5px;">
                                    <p style="margin: 0px; padding: 0px; color: #aaaa00;">Medium</p>
                                </div>
                                <p style="font-weight: 900;">...</p>
                            </div>
                            <h3 style="font-weight: bold; font-size: x-large; margin: 0px;">Brainstorming</h3>
                            <p style="color: #787486;">Brainstorming brings team members' diverse experience into play. </p>
                        </div>
                        <!-- sample div -->
                        <div class="p-3 my-3" style="width: 100%; height: 200px; background-color: #ffffff; border-radius: 20px;">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex justify-content-center align-items-center mb-2" style="width: 43px; height: 35px; background-color: #f9eee3; border-radius: 5px;">
                                    <p style="margin: 0px; padding: 0px; color: #d58d49;">Low</p>
                                </div>
                                <p style="font-weight: 900;">...</p>
                            </div>
                            <p style="color: red; margin: 0px; padding: 0px;">Overdue</p>
                            <h3 style="font-weight: bold; font-size: x-large; margin: 0px;">Brainstorming</h3>
                            <p style="color: #787486;">Brainstorming brings team members' diverse experience into play. </p>
                        </div>
                    </div>
                </div>












                <!-- div3 -->
                <div style="height: 450px; width: 325px; background-color: var(--div); border-top-left-radius: 20px; border-top-right-radius: 20px; margin-right: 30px; padding: 20px;">

                        <div class="d-flex justify-content-start align-items-center">
                            <div style="width: 10px; height: 10px; background-color: #8bc48a; border-radius: 50%; margin-right: 10px;"></div>
                            <h2 style="font-size: larger; margin: 0px; padding: 0px;">Done</h2>
                            <div class="d-flex justify-content-center align-items-center" style="width: 25px; height: 25px; background-color: #e0e0e0; border-radius: 50%; margin-left: 5px;">
                                <p style="margin: 0px; padding: 0px;">3</p>
                            </div>
                        </div>
                    <div style="width: 100%; height: 5px; background-color: #8bc48a; margin-block: 30px;"></div>

                    <div class="zenith-div-scrollable">
                        <!-- sample div -->
                        <div class="p-3 my-3" style="width: 100%; height: 200px; background-color: #ffffff; border-radius: 20px;">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex justify-content-center align-items-center mb-2" style="width: 45px; height: 35px; background-color: #ffdfdf; border-radius: 5px;">
                                    <p style="margin: 0px; padding: 0px; color: #ff0000;">High</p>
                                </div>
                                <p style="font-weight: 900;">...</p>
                            </div>
                            <h3 style="font-weight: bold; font-size: x-large; margin: 0px;">Brainstorming</h3>
                            <p style="color: #787486;">Brainstorming brings team members' diverse experience into play. </p>
                        </div>
                        <!-- sample div -->
                        <div class="p-3 my-3" style="width: 100%; height: 200px; background-color: #ffffff; border-radius: 20px;">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex justify-content-center align-items-center mb-2" style="width: 70px; height: 35px; background-color: #ffffc3; border-radius: 5px;">
                                    <p style="margin: 0px; padding: 0px; color: #aaaa00;">Medium</p>
                                </div>
                                <p style="font-weight: 900;">...</p>
                            </div>
                            <h3 style="font-weight: bold; font-size: x-large; margin: 0px;">Brainstorming</h3>
                            <p style="color: #787486;">Brainstorming brings team members' diverse experience into play. </p>
                        </div>
                        <!-- sample div -->
                        <div class="p-3 my-3" style="width: 100%; height: 200px; background-color: #ffffff; border-radius: 20px;">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex justify-content-center align-items-center mb-2" style="width: 43px; height: 35px; background-color: #f9eee3; border-radius: 5px;">
                                    <p style="margin: 0px; padding: 0px; color: #d58d49;">Low</p>
                                </div>
                                <p style="font-weight: 900;">...</p>
                            </div>
                            <p style="color: red; margin: 0px; padding: 0px;">Overdue</p>
                            <h3 style="font-weight: bold; font-size: x-large; margin: 0px;">Brainstorming</h3>
                            <p style="color: #787486;">Brainstorming brings team members' diverse experience into play. </p>
                        </div>
                    </div>
                </div>













            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>