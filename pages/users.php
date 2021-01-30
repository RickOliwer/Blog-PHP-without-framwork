<?php 

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require_once '../header/newheader.php';

//save number of items to show 
$numperpage = 3;

//find out how many users
$countsql = $pdo->prepare('SELECT COUNT(id) FROM users');
$countsql->execute();
$row = $countsql->fetch();

//divide them with how many to show
$numrecords = $row[0];
$numlinks = ceil($numrecords/$numperpage);
echo "Total number of records is ".$numlinks;
$page = $_GET['start'];
if(!$page) $page = 0; 
$start = $page * $numperpage;

$sql = "SELECT * FROM users LIMIT $start,$numperpage";
$statement = $pdo->prepare($sql);
$statement->execute();
$usersResults = $statement->fetchAll(PDO::FETCH_ASSOC);

?>


    <div class="main-container"> 
        <div class="contant">
        <?php require_once 'search.php'; ?>
        <?php foreach($usersResults as $user) : ?>  
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
                <h1 class="blog-profile_title"><a href="view-profile.php?user=<?php echo $user['id']; ?>"><?= $user['username'] ?></a></h1>
                <p class="blog-post_text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam reiciendis libero</p>
            </div>
        </div>

        </div>
        <?php endforeach; ?>

        <div class="pagination-box">
        <?php for($i = 0 ; $i < $numlinks ; $i++ ): $y = $i+1?>
            <a class="pagination" href="users.php?start=<?= $i ?>"><?= $y ?></a>
        <?php endfor ; ?>
        </div>
        
        </div>
        </div>
        </body>

</html>


