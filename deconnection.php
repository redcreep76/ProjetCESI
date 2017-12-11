<?php
    session_start();
    unset($_SESSION['user']);
    unset($_SESSION['timeout']);
    header('Location: index.php');
?>
