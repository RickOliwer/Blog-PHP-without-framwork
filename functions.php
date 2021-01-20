<?php
//session_start();
require_once 'phpmysqlconnect.php';

$pdo = initDatabase($database);

function saveToDB($pdo, $tableName, $newData){
    $sql = sprintf(
        'insert into %s (%s) values (%s)',
        $tableName,
        implode(', ', array_keys($newData)),
        ':' .  implode(', :', array_keys($newData))
    );

    $statement = $pdo->prepare($sql);
    $statement->execute($newData);
}

function  joinUserWithPost($pdo, $userID){
    $sql = 'SELECT users.email, posts.image, posts.title, posts.textarea 
            FROM users
            LEFT JOIN posts
            ON users.id = posts.user_id
            WHERE posts.user_id = :user_id';

    $statement = $pdo->prepare($sql);
    $statement->bindParam(':user_id', $userID);
    $statement->execute();

    return $statement;
}

function getTableFromDB($pdo, $tableName){
    $sql = sprintf(
        'select * from %s',
        $tableName
    );

    $statement = $pdo->prepare($sql);
    return $statement;
}

function fetchFromDataBase($statement) {
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

$posts = getTableFromDB($pdo, 'posts');
$postsResults = fetchFromDataBase($posts);

$users = getTableFromDB($pdo, 'users');
$usersResults = fetchFromDataBase($users);

function updateDB($pdo, $tableName, $newData){
    $sql = (
       "UPDATE $tableName SET email = :email, password = :password WHERE id = :id"

    );
    
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':email', $newData['email']);
    $statement->bindParam(':password', $newData['password']);
    $statement->bindParam(':id', $newData['id']);
    
    if($statement->execute()){
        $_SESSION['email'] = $newData['email'];
    }

    return true;
}


if(isset($_GET['user'])){

    if(isset($_POST['add-post-submit'])){
    $target = "images/".basename($_FILES['image']['name']);

    $image = $_FILES['image'];

    $imageName = $_FILES['image']['name'];
    $imageTmpName = $_FILES['image']['tmp_name'];
    $imageSize = $_FILES['image']['size'];
    $imageError = $_FILES['image']['error'];
    $imageType = $_FILES['image']['type'];

    $imageExt = explode('.', $imageName);
    $imageActualExt = strtolower(end($imageExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    if(in_array($imageActualExt, $allowed)){
        if($imageError === 0){
            if($imageSize < 1000000){
                $imageNameNew = uniqid('', true).".".$imageActualExt;
                $imageDestination = 'images/'.basename($imageNameNew);
                if (move_uploaded_file($imageTmpName, $imageDestination)) {
                    echo "Image uploaded successfully";
                } else {
                    echo "error";
                }

            } else {
                echo "Your file is to big";
            }
        } else {
            echo "there was an error uploading your file!"; 
        }
    } else {
        echo "You cannot upload files of this type";
    }
    
    $saveData = [
        'title' => $title = $_POST['title'],
        'textarea' => $textArea = $_POST['textarea'],
        'image' => $imageNameNew,
        'user_id' => $userID = $_POST['user_id']
    ];

    saveToDB($pdo, 'posts', $saveData);
    

    //header('Location: home.php');
}



$userID = $_GET['user'];
$postByUserStatement = joinUserWithPost($pdo, $userID);
$postByUser = $postByUserStatement->fetchAll(PDO::FETCH_CLASS);
}