<?php
require_once '../header/newheader.php';
require_once '../functions/functions.php';
$posts = getTableFromDB($pdo, 'posts');
$postsResults = fetchFromDataBase($posts);
?>
<main class="main-container">

<div class="contant">
    <div class="welcome">
        <h2>Welcome back, <?php echo $_SESSION['user']['username'] ?>!</h2>
    </div>


<?php foreach(array_reverse($postsResults) as $allPosts) : ?>
    <div class="post-card">

    <!-- add name of who posted the post -->
        <div class="post">
            <div class="post-img">
                <img src="../images/<?= $allPosts['image']?>"/>
            </div>
            <div class="post-content">
                <h2><?= $allPosts['title']?></h2>
                <p><?= $allPosts['textarea'] ?></p>
                <p><?= $allPosts['updated_at'] ?></p>
                <h3>Posted by <?= $allPosts['posted_by'] ?></h3>    
            </div>
        </div>   
    </div>
<?php endforeach; ?>
</div>
</main>
</body>

</html>

