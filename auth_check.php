<?php
session_start();

// Allow access to login.php and signup.php without a session
$current_page = basename($_SERVER['PHP_SELF']);
$public_pages = ['login.php', 'signup.php'];

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    if (!in_array($current_page, $public_pages)) {
        header("Location: login.php");
        exit();
    }
}
