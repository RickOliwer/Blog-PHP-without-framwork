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

<?php if(isset($_GET['user'])):?>
<?php foreach(array_reverse($postByUser) as $userPosts) : ?>
    <div class="post-card">
        <h3>Posted by <?php echo $_SESSION['user']['username'] ?></h3>
        <div class="post">
            <div class="post-img">
                <img src="images/<?= $userPosts->image?>">
            </div>
            <div class="post-content">
                <h2><?= $userPosts->title?></h2>
                <p><?= $userPosts->textarea ?></p>
                <p><?= $userPosts->date ?></p>   
            </div>
        </div>   
    </div>
<?php endforeach; ?>
<?php endif ;?>
    </div>

        
        <aside class="side-bar">
            <ul>
                <li><a href="settings.php">Settings</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Settings</a></li>
            </ul>

            <?php foreach($usersResults as $user) : ?>
        <div>
            <div>
                <a href="#"><?= $user['id']?> <?= $user['username'] ?></a>
            </div>
            
        </div>
        <?php endforeach; ?>
        </aside>
    </div>

</main>
</body>
</html>