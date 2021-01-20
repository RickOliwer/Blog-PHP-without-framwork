<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require 'header.php';

?>



<main>
    <div class="main-container">
        <div class="contant">
        <h2>Profile</h2>

        <p>Your email: <?php echo $_SESSION['user']['email'] ?></p>
        <h2>Responsive Polaroid Images / Cards</h2>
        <?php if(isset($_GET['user'])):?>
        <div class="posts">
        <?php foreach(array_reverse($postByUser) as $userPosts) : ?>
        <div class="post-card">
        <div class="polaroid">
        <img src="images/<?= $userPosts->image?>" alt="" style="width:100%">
        <div class="post-container">
        <h3><?= $userPosts->title?></h3>
        <p><?= $userPosts->textarea ?></p>
        </div>
        </div>
        </div>
        <?php endforeach ;?>
        <?php endif ;?>
    </div>

        </div>
        <aside class="side-bar">
            <ul>
                <li><a href="settings.php">Settings</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Settings</a></li>
            </ul>
        </aside>
    </div>

</main>
</body>
</html>