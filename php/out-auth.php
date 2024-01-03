<?php 
    session_start();

    if (isset($_SESSION['Username']) && isset($_SESSION['Password'])) {
        $result = ValidateAccount($_SESSION['Username'],$_SESSION['Password'],$Connection);
        if ($result[0]){
            setUser($_SESSION['Username'],$_SESSION['Password']);
            header('Location: ./home.php');
            exit;
        } else {
            clearUser();
            echo '<script>';
            echo 'alert("' . $result[1] . '")';
            echo '</script>';
        }
    } 

    function setUser($Username,$Password) {
        $_SESSION['Username'] = $Username;
        $_SESSION['Password'] = $Password;
    }

    function clearUser() {
        session_unset();
        session_destroy();
        header('Location: ./index.php');
        exit;
    }

   