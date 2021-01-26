<?php 
require_once '../header/newheader.php';
$users = getTableFromDB($pdo, 'users');
$usersResults = fetchFromDataBase($users);
?>

<?php foreach($usersResults as $user) : ?>
    <div>
        <div>
            <a href="view-profile.php?user=<?php echo $user['id']; ?>"><?= $user['id']?> <?= $user['username'] ?></a>
        </div>
    </div>
<?php endforeach; ?>