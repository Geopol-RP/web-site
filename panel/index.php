<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['auth']['user'])) {
    header("location: login.php");
    exit();
}
?>