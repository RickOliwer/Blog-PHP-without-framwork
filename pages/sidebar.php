<?php

$userid = $_SESSION['user']['id'];

$sidebar = array(
    
    array(
        'slug' => 'users.php',
        'title' => 'Users'
    ),
    
    array(
        'slug' => "settings.php?user=$userid",
        'title' => 'Settings'
    ),

    array(
        'slug' => '#',
        'title' => 'Privacy Checkup'
    
    ),

    array(
        'slug' => '#',
        'title' => 'Privacy shortcuts'
    ),

    array(
        'slug' => '#',
        'title' => 'Activity log'
    ),

    array(
        'slug' => '#',
        'title' => 'News Feed preferences'
    ),

    array(
        'slug' => '#',
        'title' => 'Language'
    ),
    
);

?>