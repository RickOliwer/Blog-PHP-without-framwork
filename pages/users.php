<?php 
require_once '../header/newheader.php';
$users = getTableFromDB($pdo, 'users');
$usersResults = fetchFromDataBase($users);
?>

<?php foreach($usersResults as $user) : ?>
    <div class="main-container">
        <div class="contant">
    <div class="profile-card">
        <div class="blog-profile">
            <div class="blog-profile_img">
                <img src="../profileimages/<?= $user['profile_image']?>" alt="">
            </div>
            <div class="blog-profile_info">
                <div class="blog-profile_data">
                    <span>Joined <?= $user['created_at']?></span>
                    <span>Email <?= $user['email']?></span>
                    
                </div>
                <h1 class="blog-profile_title">            <a href="view-profile.php?user=<?php echo $user['id']; ?>"><?= $user['username'] ?></a></h1>
                <p class="blog-post_text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam reiciendis libero</p>
                <!-- <a href="#" class="blog-profile_cta">Read More</a> -->
            </div>
        </div>

        </div>
        </div>
        </div>
<?php endforeach; ?>