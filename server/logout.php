<?php
    session_start();
    session_destroy();
    session_unset();

    unset($_SESSION['username']);
    unset($_SESSION['id_login']);

    header('location:login.php');

?>