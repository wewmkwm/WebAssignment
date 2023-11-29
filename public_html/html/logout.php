<?php
    //user logout, clear session
    session_start();
    unset($_SESSION['email']);
    unset($_SESSION['username']);
    unset($_SESSION['password']);
    unset($_SESSION['phonenumber']);
    header("location:login.php");
?>
