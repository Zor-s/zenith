<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="css/globals.css">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: var(--div);
            padding: 10px;
        }

        .signup-container {
            background-color: var(--div);
            padding: 40px 20px;
            border: 1px solid black;
            width: 100%;
            max-width: 400px;
            text-align: center;
            box-sizing: border-box;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: var(--text);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            text-align: left;
            margin-bottom: 5px;
            margin-top: 20px;
            font-size: 14px;
            color: var(--text);
        }

        .password-container {
            position: relative;
            width: 100%;
            margin-bottom: 15px;
        }

        input {
            padding: 10px;
            padding-right: 40px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            width: 100%;
            height: 40px;
        }

        .eye-icon {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            width: 20px;
            height: 20px;
        }

        button {
            padding: 10px;
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
        }

        button:hover {
            background-color: var(--primary);
        }

        .logo-signup {
            max-width: 150px;
            margin-bottom: 30px;
        }

        @media (max-width: 768px) {
            .signup-container {
                width: 100%;
                padding: 20px;
                margin: 0 10px;
            }
        }
    </style>
</head>

<body>
    <div class="signup-container">
        <img src="images/ZENITHfd.png" alt="Zenith logo" class="logo-signup">
        <form action="./php/signup.php" method="post" onsubmit="return checkPasswordsMatch()">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter username" required>

            <label for="password">Password</label>
            <div class="password-container">
                <input type="password" id="password" name="password" placeholder="Enter password" required>
                <img src="images/eye.png" alt="Show" class="eye-icon" id="toggle-password" onclick="togglePassword()">
            </div>

            <label for="confirm-password" style="margin-top: 5px;">Confirm Password</label>
            <div class="password-container">
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm password" required>
                <img src="images/eye.png" alt="Show" class="eye-icon" id="toggle-confirm-password" onclick="toggleConfirmPassword()">
            </div>

            <button type="submit">Sign Up</button>
        </form>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const passwordIcon = document.getElementById('toggle-password');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.src = 'images/hidden.png';
            } else {
                passwordInput.type = 'password';
                passwordIcon.src = 'images/eye.png';
            }
        }

        function toggleConfirmPassword() {
            const confirmPasswordInput = document.getElementById('confirm-password');
            const confirmPasswordIcon = document.getElementById('toggle-confirm-password');
            if (confirmPasswordInput.type === 'password') {
                confirmPasswordInput.type = 'text';
                confirmPasswordIcon.src = 'images/hidden.png';
            } else {
                confirmPasswordInput.type = 'password';
                confirmPasswordIcon.src = 'images/eye.png';
            }
        }



        function checkPasswordsMatch() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirm-password").value;
            if (password !== confirmPassword) {
                alert("Passwords do not match!");
                return false; // Prevent form submission
            }
            return true; // Allow form submission
        }
    </script>
</body>

</html>