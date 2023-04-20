<?php
    session_start();
    //close current session
    session_unset();
    session_destroy();

    //clear cookies
    setcookie('userName','',time() - 60);
    setcookie('password','',time() - 60); 
    setcookie('PHPSESSID','',time() - 60);

    header('location: login.php');
    exit;
?>