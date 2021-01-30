<?php
session_start();
require_once '../functions/functions.php';
include 'header-array.php';


if (!isset($_SESSION['logged_in'])) {
    header('Location: index.html');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Blog</title>
    <link rel="stylesheet" href="../css/header-style.css">
    <link rel="stylesheet" href="../css/main-container.css">
    <link rel="stylesheet" href="../css/posts.css">
    <link rel="stylesheet" href="../css/profile-info-styling.css">
    <link rel="stylesheet" href="../css/aside-style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/login-style.css">
    <script src="../js/navApp.js" defer></script>
</head>
<body>

<header>
    <nav>
        
        <?php include 'logo.php'; ?>

        <?php include 'loop_array_nav_links.php'; ?>

        <?php include 'burger.php'; ?>

    </nav>

</header>



