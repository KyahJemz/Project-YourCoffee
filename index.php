<?php 
    include_once './php/config.php';
    include_once './php/db.php';
    include_once './php/out-auth.php';
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['LoginBtn'])) {
            $result = ValidateAccount($_POST['Username'],$_POST['Password'],$Connection);
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
    <link rel="stylesheet" href="./styles/form.css">
    <link rel="icon" href="./images/logo.png" type="image/x-icon">
    <title>Login - Your Coffee</title>
</head>
<body>
    <div class="login-container">
        <h2>Login to Your Coffee</h2>
        <form action="" method="post">
            <div class="input-container">
                <label for="Username">Username:</label>
                <input type="text" id="username" name="Username" required>
            </div>
            <div class="input-container">
                <label for="Password">Password:</label>
                <input type="password" id="password" name="Password" required>
            </div>
            <button name="LoginBtn" type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="./registration.php">Sign up here</a></p>
    </div>
</body>
</html>