<?php

require_once 'functions.php';
if(isset($_GET['user'])){



    if(isset($_POST['comment-submit'])){
        $saveData = [
            'comment' => $textArea = $_POST['comment'],
            'comment_user_id' => $userID = $_POST['comment_user_id'],
            'from_id' => $from_id = $_SESSION['user']['username'],
        ];

        saveToDB($pdo, 'comments', $saveData);
    }

    $userID = $_GET['user'];
    $addCommentToUser = joinUserWithComment($pdo, $userID);
    $commentByUser = $addCommentToUser->fetchAll(PDO::FETCH_CLASS);

}