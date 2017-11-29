<?php
    if (!isset($_SESSION)) {
        session_start();
    }

    function isLogged() {
        if ((isset($_SESSION['logged'])) && ($time - $_SESSION['logged'] < 900)) {
            $_SESSION['logged'] = $time;
            return true;
        }
        unset($_SESSION['logged']);
        return false;
    }
?>
