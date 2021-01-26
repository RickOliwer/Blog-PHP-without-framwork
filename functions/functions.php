<?php
//session_start();
require_once '../database/phpmysqlconnect.php';

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


function joinUserWithPost($pdo, $userID){
    $sql = 'SELECT users.email, users.username,
    users.profile_image, users.f_name, users.l_name, users.created_at, posts.id, posts.image, posts.title, posts.textarea, posts.updated_at 
            FROM users
            LEFT JOIN posts
            ON users.id = posts.user_id
            WHERE posts.user_id = :user_id';

    $statement = $pdo->prepare($sql);
    $statement->bindParam(':user_id', $userID);
    $statement->execute();

    return $statement;
}

function joinUserWithComment($pdo, $userCommentID){
    $sql = 'SELECT users.email, comments.comment_user_id, comments.comment, comments.id
            FROM users
            LEFT JOIN comments
            ON users.id = comments.comment_user_id
            WHERE comments.comment_user_id = :comment_user_id';
    
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':comment_user_id', $userCommentID);
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

function updateProfile($pdo, $tableName, $newData){
    $sql = (
        "UPDATE $tableName SET f_name = :f_name, l_name = :l_name, profile_image = :profile_image WHERE id = :id "
    );

    $statement = $pdo->prepare($sql);
    $statement->bindParam(':f_name', $newData['f_name']);
    $statement->bindParam(':l_name', $newData['l_name']);
    $statement->bindParam(':profile_image', $newData['profile_image']);
    $statement->bindParam(':id', $newData['id']);
    
    
    $statement->execute();


    return true;
}


