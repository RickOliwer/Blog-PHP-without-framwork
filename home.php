<?php
require_once 'header.php';
require_once 'functions.php';
?>

    <div>
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Welcome back, <?php echo $_SESSION['user']['username'] ?>!</h2>
    </div>

    <?php foreach(array_reverse($postsResults) as $allPosts) : ?>
      <div class="polaroid">
        <img src="images/<?= $allPosts['image']?>" alt="" style="width:100%">
        <div class="post-container">
        <h3><?= $allPosts['title']?></h3>
        <p><?= $allPosts['textarea'] ?></p>
        </div>
        </div>
    <?php endforeach; ?>


</body>

</html>

