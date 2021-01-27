<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require_once '../header/newheader.php';
require_once '../functions/functions.php';

$search = $_POST['search'];
if (isset($search)){
    $searchsql = $pdo->prepare("SELECT COUNT(id) AS numresults FROM users where username LIKE ? or l_name LIKE ? OR f_name LIKE ?");
    $term = "%$search%";
    $searchsql->bindValue(1, $term, PDO::PARAM_STR);
    $searchsql->bindValue(2, $term, PDO::PARAM_STR);
    $searchsql->bindValue(3, $term, PDO::PARAM_STR);
    $searchsql->execute();
    $searchrow = $searchsql->fetch();
    echo 'your search for <strong>'.$search.'</strong> generated ('.$searchrow['numresults'].') results.<br>'; 

   
    $displaySearchsql = $pdo->prepare("SELECT * FROM users where username LIKE ? or l_name LIKE ? OR f_name LIKE ?");
    $displaySearchsql->bindValue(1, $term, PDO::PARAM_STR);
    $displaySearchsql->bindValue(2, $term, PDO::PARAM_STR);
    $displaySearchsql->bindValue(3, $term, PDO::PARAM_STR);
    $displaySearchsql->execute();
    $displaySearchrow = $displaySearchsql->fetchAll(PDO::FETCH_ASSOC);
    
}

?>



<div class="main-container"> 
<div class="contant">
<form action="search.php" method="POST">
        <div class="txt_field">
            <input type="text" name="search" required>
            <span></span>
            <label for="">Find a user</label>
        </div>
        <input type="submit" name="submit-search" value="Search">
</form>

<?php foreach($displaySearchrow as $displayUser) : ?>  
    <div class="profile-card">
        <div class="blog-profile">
            <div class="blog-profile_img">
                <img src="../profileimages/<?= $displayUser['profile_image']?>" alt="">
            </div>
            <div class="blog-profile_info">
                <div class="blog-profile_data">
                    <span>Joined <?= $displayUser['created_at']?></span>
                    <span>Email <?= $displayUser['email']?></span>
                    
                </div>
                <h1 class="blog-profile_title"><a href="view-profile.php?user=<?php echo $displayUser['id']; ?>"><?= $displayUser['username'] ?></a></h1>
                <p class="blog-post_text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam reiciendis libero</p>
            </div>
        </div>

        </div>
    <?php endforeach; ?>
</div>
</div>

</body>

</html>