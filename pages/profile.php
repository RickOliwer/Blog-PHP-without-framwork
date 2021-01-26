<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require_once '../header/newheader.php';
require_once '../functions/add-posts-code.php';
require_once '../functions/delete-posts-code.php';
require_once '../functions/delete-comment.php';
require_once '../functions/add-comment.php';
?>



<main>
    <div class="main-container">
        <div class="contant">
        <h2>Profile</h2>
        <div class="profile-card">
        <div class="blog-profile">
            <div class="blog-profile_img">
                <img src="" alt="">
            </div>
            <div class="blog-profile_info">
                <div class="blog-profile_data">
                    <span>joined</span>
                    
                </div>
                <h1 class="blog-profile_title">Jakob Ehde</h1>
                <p class="blog-post_text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam reiciendis libero perspiciatis repellat delectus odio suscipit eos vitae laboriosam culpa voluptatum laudantium, eaque doloremque distinctio asperiores quas aliquid eligendi nulla!</p>
                <a href="#" class="blog-profile_cta">Read More</a>
            </div>
        </div>

        </div>

        <p>Your email: <?php echo $_SESSION['user']['email'] ?></p>

<?php if(isset($_GET['user'])):?>
<?php foreach(array_reverse($postByUser) as $userPosts) : ?>
    <div class="post-card">
        <h3>Posted by <?= $userPosts->username ?></h3>
        <div class="post">
            <div class="post-img">
                <img src="../images/<?= $userPosts->image?>">
            </div>
            <div class="post-content">
                <h2><?= $userPosts->title?></h2>
                <p><?= $userPosts->textarea ?></p>
                <p><?= $userPosts->updated_at ?></p>
                <a href="profile.php?delete=<?php echo $userPosts->id ?>">Delete</a>
            </div>
        </div>   
    </div>
<?php endforeach; ?>

    </div>

        
        <aside class="side-bar">


            <?php include 'sidebar.php'; ?>
            <ul>
            <?php foreach($sidebar as $items): ?>
            <li><a href="<?= $items['slug'] ?>"> <?= $items['title']?> </a></li>
            <?php endforeach ; ?>
            </ul>

            <div class="messeges">
                <?php foreach($commentByUser as $comment) : ?>
                <p><?php echo $comment->comment; ?></p>
                <a href="profile.php?delete-comment=<?php echo $comment->id ?>">Delete</a>
                <?php endforeach ; ?>


            </div>

        </aside>
    </div>
<?php endif ;?>


</main>
</body>
</html>