<?php

$userid = $_SESSION['user']['id'];

$sidebar = array(
    
    array(
        'slug' => "settings.php?user=$userid",
        'title' => 'Settings'
    ),
    
    array(
        'slug' => 'users.php',
        'title' => 'Users'
    ),
    
);

?>