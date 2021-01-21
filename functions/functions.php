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

function  joinUserWithPost($pdo, $userID){
    $sql = 'SELECT users.email, posts.image, posts.title,   posts.textarea, posts.date 
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


