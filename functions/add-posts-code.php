<?php

require_once 'functions.php';

if(isset($_GET['user'])){

    if(isset($_POST['add-post-submit'])){
        $imageInput = 'image';
        $folder = '../images/';
        $imageByteSize = 5000000;
        $imageName = addImageToFolder($imageInput, $folder, $imageByteSize);

        $saveData = [
            'title' => $title = $_POST['title'],
            'textarea' => $textArea = $_POST['textarea'],
            'image' => $imageName,
            'user_id' => $userID = $_POST['user_id'],
            'posted_by' => $postedBy = $_SESSION['user']['username']
        ];
        saveToDB($pdo, 'posts', $saveData);

}

$userID = $_GET['user'];
$postByUserStatement = joinUserWithPost($pdo, $userID);
$postByUser = $postByUserStatement->fetchAll(PDO::FETCH_CLASS);
}