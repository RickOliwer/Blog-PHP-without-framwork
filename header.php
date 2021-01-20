<?php
session_start();
require_once 'functions.php';

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
    <link rel="stylesheet" href="css/header-style.css">
    <link rel="stylesheet" href="css/main-container.css">
    <link rel="stylesheet" href="css/posts.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login-style.css">
</head>
<body>

<header>
    <nav>
        <div class="logo">
            <h4>The Blog</h4>
        </div>

        <ul class="nav_links">
            <li><a href="home.php">Home</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="add-post.php?user=<?php echo $_SESSION['user']['id']; ?>">Add Post</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>

        <div class="burger">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
    </div>
    </nav>


</header>

<script>

const navSlide = () => {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav_links');
    const navLinks = document.querySelectorAll('.nav_links li');

    burger.addEventListener('click',()=>{
        nav.classList.toggle('nav-active');

        navLinks.forEach((link, index) =>{
            if(link.style.animation){
                link.style.animation = '';
            } else {
                link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.3}s`
            }
        });
    });
}

navSlide();
</script>