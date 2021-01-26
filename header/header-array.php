<?php

$userid = $_SESSION['user']['id'];

$navItems = array(
    
    array(
        'slug' => "home.php?user=$userid",
        'title' => 'Home'
    ),
    
    array(
        'slug' => "profile.php?user=$userid",
        'title' => 'Profile'
    ),
    
    array(
        'slug' => "add-post.php?user=$userid",
        'title' => 'Add Post'
    ),
    
    array(
        'slug' => 'logout.php',
        'title' => 'Logout'
    ),
);

?>