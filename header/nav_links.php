<ul class="nav_links">
    <li>
        <a href="home.php?user=<?php echo $_SESSION['user']['id']; ?>">Home</a>
    </li>
    <li>
        <a href="profile.php?user=<?php echo $_SESSION['user']['id']; ?>">Profile</a>
    </li>
    <li>
        <a href="add-post.php?user=<?php echo $_SESSION['user']['id']; ?>">Add Post</a>
    </li>
    <li>
        <a href="logout.php">Logout</a>
    </li>
</ul>