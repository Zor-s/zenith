<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>
<style>
    body,
    html {
        height: 100%;
        margin: 0;
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
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
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
        display: flex;
        height: 100vh;
    }

    .intro {
        width: 300px;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    .form-container {
        position: fixed;
        top: 20%;
        right: 0;
    }

    .intro {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        margin-top: 100px;
        line-height: 1.25;
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
            width: 80%;
        }
    }

    @media only screen and (min-width: 768px) and (max-width: 999px) {
        .intro {
            display: none;
        }

        #left-pic {
            display: none;
        }

        .form-container {
            width: 450px;
        }
    }

    @media only screen and (min-width: 1000px) and (max-width: 1324px) {
        .intro {
            display: none;
        }

        .form-container {
            width: 400px;
        }
    }

    /* Laptop Devices */
    @media only screen and (min-width: 1325px) and (max-width: 1780px) {
        .intro {
            font-size: small;
            width: 40ch;
        }

        .form-container {
            width: 400px;
        }
    }

    /* PC Devices */
    @media only screen and (min-width: 1781px) {
        .intro {
            font-size: larger;
            width: 60ch;
        }

        .form-container {
            width: 500px;
        }
    }
</style>

<body>
    <div class="wrapper">
        <img id="left-pic" class="align-items-center position-fixed me-5" src="images/ZENITHaf.png" alt="Zenith Logo with Shadow" width="650px">
        <div class="intro">
            <p>With the increasing complexity of modern work and life, managing time and tasks
                efficiently has become a major challenge for many individuals and teams. Zenith is
                designed to solve these challenges by providing a comprehensive productivity tool that
                helps users manage tasks, set priorities, and monitor their progress in real time. </p>
        </div>
        <div class="form-container me-5">
            <form>
                <img src="images/ZENITHfd.png" width="200px" alt="Zenith Logo">
                <strong>Nice to see you again!</strong>
                <div class="form-group mt-3">
                    <label for="emailOrPhone">Login</label>
                    <input type="text" class="form-control" id="emailOrPhone" name="emailOrPhone" aria-describedby="emailHelp" placeholder="Email or Phone Number">
                </div>
                <div class="form-group mt-3">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="mt-4">
                    <label class="switch">
                        <input type="checkbox">
                        <span class="slider round"></span>
                    </label>
                    <span>Remember me</span>
                    <span class="text-primary" style="float:right;">Forgot password?</span>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-3">Sign in</button>
                <hr>
                <div class="text-center">
                    <span>Dont have account?</span><a class="ms-3" style="text-decoration:none;" href="#">Sign up now</a>
            </form>
        </div>
    </div>


</body>

</html>
