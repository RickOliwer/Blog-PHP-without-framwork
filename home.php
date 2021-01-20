<?php
require_once 'header.php';
require_once 'functions.php';
?>

    <div>
        <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Welcome back, <?php echo $_SESSION['user']['username'] ?>!</h2>
    </div>

    <h2>Responsive Polaroid Images / Cards</h2>
<div class="posts">
<?php foreach($results as $post) : ?>
<div class="polaroid">
  <img src="images/<?= $post['image']?>" alt="" style="width:100%">
  <div class="post-container">
    <h3><?= $post['title']?></h3>
    <p><?= $post['textarea'] ?></p>
  </div>
</div>
<?php endforeach ;?>

</div>
</body>

</html>

