<?php 
require_once '../header/newheader.php';
require_once '../functions/add-posts-code.php';
require_once '../functions/add-comment.php';
?>


<main>

<div class="main-container">
<?php if(isset($_GET['user'])):?>
    <div class="contant">
    <?php foreach($postByUser as $userInfo) : ?>
    <div class="profile-card">
        <div class="blog-profile">
            <div class="blog-profile_img">
                <img src="../profileimages/<?= $userInfo->profile_image?>" alt="">
            </div>
            <div class="blog-profile_info">
                <div class="blog-profile_data">
                    <span>Joined <?= $userInfo->created_at?></span>
                    <span>Email <?= $userInfo->email?></span>
                    
                </div>
                <h1 class="blog-profile_title"><?= $userInfo->f_name ?> <?= $userInfo->l_name?></h1>
                <p class="blog-post_text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam reiciendis libero</p>
                <!-- <a href="#" class="blog-profile_cta">Read More</a> -->
            </div>
        </div>

        </div>
        <?php endforeach; ?>
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

<form action="" method="POST">
<label for="">Comment</label>
<textarea name="comment" type="text" require></textarea>
                
<input type="submit" name="comment-submit" value="Submit">
<input type="hidden" value="<?php echo $_GET['user'] ?>" name="comment_user_id" /> 

</form>
<p></p>

</div>

</aside>
<?php endif ;?>
</div>



</main>
</body>
</html>