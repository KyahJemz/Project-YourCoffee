<?php 
    include_once './php/config.php';
    include_once './php/db.php';
    include_once './php/out-auth.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['RegisterBtn'])) {
            $result = CreateAccount($_POST['Name'],$_POST['Username'],$_POST['Password'],$_POST['ConfirmPassword'],$Connection);
            if ($result[0]){
                setUser($_POST['Username'],$_POST['Password']);
                header('Location: ./home.php');
                exit;
            } else {
                echo '<script>';
                echo 'alert("' . $result[1] . '")';
                echo '</script>';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="./styles/form.css">
    <title>Registration - Your Coffee</title>
</head>
<body>
    <div class="registration-container">
        <h2>Create an Account</h2>
        <form action="" method="post">
            <div class="input-container">
                <label for="Name">Name:</label>
                <input type="text" id="name" name="Name" required>
            </div>
            <div class="input-container">
                <label for="Username">Username:</label>
                <input type="text" id="username" name="Username" required>
            </div>
            <div class="input-container">
                <label for="Password">Password:</label>
                <input type="password" id="password" name="Password" required>
            </div>
            <div class="input-container">
                <label for="ConfirmPassword">Confirm Password:</label>
                <input type="password" id="confirm-password" name="ConfirmPassword" required>
            </div>
            <button name="RegisterBtn" type="submit">Register</button>
        </form>
        <p>Already have an account? <a href="./index.php">Log in here</a></p>
    </div>
</body>
</html>
