<?php
    session_start();
    session_destroy();
    header("Location: ../front/login.html");
    exit();
?>

