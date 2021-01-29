<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require_once '../header/newheader.php';
require_once '../functions/add-posts-code.php';
require_once '../functions/delete-posts-code.php';
require_once '../functions/delete-comment.php';
require_once '../functions/add-comment.php';
$users = getTableFromDB($pdo, 'users');
$usersResults = fetchFromDataBase($users);

?>



<main>

<?php if(isset($_GET['user'])):?>
    <div class="main-container">
        <div class="contant">
        <h2>Profile</h2>
        <div class="profile-card">
        <div class="blog-profile">
            <div class="blog-profile_img">
                <img src="../profileimages/<?= $_SESSION['user']['profile_image']?>" alt="">
            </div>
            <div class="blog-profile_info">
                <div class="blog-profile_data">
                    <span>Joined <?php echo $_SESSION['user']['created_at']?></span>
                    <span>Email <?php echo $_SESSION['user']['email']?></span>
                    
                </div>
                <h1 class="blog-profile_title"><?php echo $_SESSION['user']['f_name']?> <?php echo $_SESSION['user']['l_name']?></h1>
                <p class="blog-post_text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam reiciendis libero</p>
            </div>
        </div>

        </div>
        

        


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
            <div class="settings">
            <h2>Settings, privacy & users</h2>
            <?php include 'sidebar.php'; ?>
            <ul>
            <?php foreach($sidebar as $items): ?>
            <li><a href="<?= $items['slug'] ?>"> <?= $items['title']?> </a></li>
            <?php endforeach ; ?>
            </ul>
            </div>

            
            <div class="messages">
            <h3>Messages</h3>
                <?php foreach($commentByUser as $comment) : ?>
                <div class="comment">
                <div class="comment-bubble">
                <p><?php echo $comment->comment; ?></p>
                <p>Messages from <?php echo $comment->from_id; ?></p>
                </div>
                <form action="">
                        <p class="reply-message">Hej hej</p>
                    <textarea name="reply-commment" type="text"></textarea>
                    <div class="reply-submit">
                    <input type="submit" name="submit-answer" value="Reply">
                    </div>
                </form>
                
                <div class="delete-comment">
                <a href="profile.php?delete-comment=<?php echo $comment->id ?>">Delete</a>
                </div>
                </div>
                <?php endforeach ; ?>


            </div>

        </aside>
    </div>
<?php endif ;?>


</main>
</body>
</html>