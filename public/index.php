<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/globals.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    body,
    html {
        height: 100%;
        margin: 0;
        font-family: "Inter", sans-serif;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: var(--primary);
    }

    input:focus+.slider {
        box-shadow: 0 0 1px var(--primary);
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

    .wrapper {
        height: 100vh;
    }


    form {
        display: flex;
        flex-direction: column;
    }

    .form-container {
        position: fixed;
        top: 15%;
        right: 0;
        margin-right: 3em;
    }

    .intro {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 300px;
        transform: translate(-50%, -50%);
        margin-top: 100px;
        line-height: 1.25;
        font-weight: 500;
    }

    #logo {
        display: flex;
        justify-content: center;
        width: 100%;

    }

    #signupButton,
    #forgotButton {
        color: var(--primary);
    }

    #forgotButton:hover,
    #signupButton:hover {
        border-bottom: 1px solid var(--primary);
    }

    #submitButton {
        background-color: var(--primary);
        color: white;
    }

    #submitButton:hover {
        background-color: var(--primary-lite);
        color: var(--primary);
    }

    #greeting {
        font-size: 1.4em;
    }

    form input {
        padding: 10px;
        padding-right: 40px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
        width: 100%;
        height: 60px;
    }

    form input::placeholder {
        font-size: large;
        font-weight: 450;

    }

    #left-pic {
        left: -30px;
        margin-top: 60px;

    }

    .eyeIcon {
        position: absolute;
        top: 60%;
        right: 10px;
        transform: translateY(-50%);
        cursor: pointer;
        width: 25px;
        height: 25px;
        opacity: 0.6;
    }

    /* Mobile Devices */
    @media only screen and (max-width: 767px) {
        .intro {
            display: none;
        }

        #left-pic {
            display: none;
        }

        .form-container {
            width: 90%;
            margin-right: 5%;
        }

        #remember,
        #forgotButton {
            font-size: smaller;
        }
    }

    /* Mobile-Laptop Devices */
    @media only screen and (min-width: 768px) and (max-width: 999px) {
        .intro {
            display: none;
        }

        #left-pic {
            display: none;
        }

        .form-container {
            width: 450px;
            margin-right: 20%;
        }


    }

    /* Laptop Devices */
    @media only screen and (min-width: 1000px) and (max-width: 1279px) {
        .intro {
            display: none;
        }
        #left-pic {
            top: -80px;
        }
        .form-container {
            width: 400px;
        }
    }

    /* Laptop Devices */
    @media only screen and (min-width: 1280px) and (max-width: 1780px) {
        .intro {
            font-size: small;
            width: 40ch;
            font-weight: 700;
            margin-top: 150px;
        }

        #left-pic {
            top: -80px;
        }

        .form-container {
            width: 400px;
            top: 10%;
        }

    }

    @media only screen and (min-width: 1440px) and (max-width: 1780px) {
        #left-pic {
            top: -80px;
        }

        .intro {
            font-size: medium;
            width: 40ch;
            font-weight: 700;
        }

        .form-container {
            width: 400px;
            top: 20%;
        }
    }

    /* PC Devices */
    @media only screen and (min-width: 1781px) {
        .intro {
            font-size: larger;
            width: 55ch;
            margin-top: 150px;
            font-weight: 700;

        }
        #left-pic {
            top: -80px;
        }
        .form-container {
            width: 500px;
        }
    }
</style>

<body>
    <div class="wrapper">
        <img id="left-pic" class="align-items-center position-fixed me-5" src="images/ZENITHaf.png" alt="Zenith Logo with Shadow" width="650px" draggable="false">
        <div class="intro">
            <p>With the increasing complexity of modern work and life, managing time and tasks
                efficiently has become a major challenge for many individuals and teams. Zenith is
                designed to solve these challenges by providing a comprehensive productivity tool that
                helps users manage tasks, set priorities, and monitor their progress in real time. </p>
        </div>
        <div class="form-container">
            <form action="./php/login.php" method="post">
                <div id="logo" class="pb-4"><img src="images/ZENITHfd.png" width="200px" alt="Zenith Logo" draggable="false"></div>
                <div id="greeting"><strong>Nice to see you again!</strong></div>
                <div class="form-group mt-3">
                    <label for="username" class="ps-3" id="loginLabel">Login</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                </div>
                <div class="form-group mt-3">
                    <label for="password" class="ps-3" id="passwordLabel">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
                    <img src="images/eye.png" alt="Show" class="eyeIcon" id="toggleEye" onclick="togglePassword()">
                </div>
                <div class="mt-4">
                    <label class="switch">
                        <input type="checkbox">
                        <span class="slider round"></span>
                    </label>
                    <span id="remember">Remember me</span>
                    <a id="forgotButton" style="float:right; text-decoration:none;" href="#">Forgot password?</a>
                </div>
                <button id="submitButton" type="submit" class="btn w-100 mt-3 mb-2">Sign in</button>
                <hr>
                <div class="text-center">
                    <span>Don't have account?</span><a class="ms-3" id="signupButton" style="text-decoration:none;" href="#">Sign up now</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const passwordIcon = document.getElementById('toggleEye');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.src = 'images/hidden.png';
            } else {
                passwordInput.type = 'password';
                passwordIcon.src = 'images/eye.png';
            }
        }
    </script>

</body>

</html>
