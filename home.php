<?php
require_once 'header.php';
require_once 'functions.php';
?>
<main class="main-container">

<div class="home-contant">
    <div>
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Welcome back, <?php echo $_SESSION['user']['username'] ?>!</h2>
    </div>


<?php foreach(array_reverse($postsResults) as $allPosts) : ?>
    <div class="post-card">
        <h3>Posted by <?php echo $_SESSION['user']['username'] ?></h3>
        <div class="post">
            <div class="post-img">
                <img src="images/<?= $allPosts['image']?>"/>
            </div>
            <div class="post-content">
                <h2><?= $allPosts['title']?></h2>
                <p><?= $allPosts['textarea'] ?></p>
                <p><?= $allPosts['date'] ?></p>    
            </div>
        </div>   
    </div>
<?php endforeach; ?>
</div>
</main>
</body>

</html>

