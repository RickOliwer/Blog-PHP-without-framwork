<?php

$navItems = array(
    
    array(
        'slug' => 'home.php?user=<?php echo $_SESSION[\'user\'][\'id\']; ?>',
        'title' => 'Home'
    ),
    
    array(
        'slug' => 'profile.php?user=<?php echo $_SESSION[\'user\'][\'id\']; ?>',
        'title' => 'Profile'
    ),
    
    array(
        'slug' => 'add-post.php?user=<?php echo $_SESSION[\'user\'][\'id\']; ?>',
        'title' => 'Add Post'
    ),
    
    array(
        'slug' => 'logout.php',
        'title' => 'Logout'
    ),
);

?>