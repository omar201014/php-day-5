<?php
    //close current session
    session_start();
    $_SESSION = array();
    session_destroy();

    //clear all cookies     
    setcookie('PHPSESSID','',time()-60);
    header('location: login.php');
?>