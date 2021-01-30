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
    $sql = 'SELECT users.email, users.username, posts.id, posts.image, posts.title, posts.textarea, posts.updated_at 
            FROM users
            LEFT JOIN posts
            ON users.id = posts.user_id
            WHERE posts.user_id = :user_id';

    $statement = $pdo->prepare($sql);
    $statement->bindParam(':user_id', $userID);
    $statement->execute();

    return $statement;
}

function joinReplyWithComment($pdo, $postID){
    $sql = 'SELECT comments.id, reply.reply, reply.created_at, reply.posted_by
            FROM comments
            LEFT JOIN reply
            ON comments.id = reply.comment_id
            WHERE reply.comment_id = :comment_id';
    
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':comment_id', $postID);
    $statement->execute();

    return $statement;
}

function addProfileToViewProfile($pdo, $userID){
    $sql = 'SELECT users.email, users.username,
    users.profile_image, users.f_name, users.l_name, users.created_at FROM users WHERE users.id = :id';
    $statement = $pdo->prepare($sql);
    $statement->bindParam(':id', $userID);
    $statement->execute();

    return $statement;

}

function joinUserWithComment($pdo, $userCommentID){
    $sql = 'SELECT users.email, users.username, users.id, comments.comment_user_id, comments.comment, comments.id, comments.from_id
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

function deleteColumnFromDB($pdo, $tableName, $id){
    $sql = sprintf('delete from %s where id=:id',
    $tableName,
    );
    
    $statement = $pdo->prepare($sql);
    $statement->execute(array(":id"=>$id));
}

function addImageToFolder($imageInput, $folder, $imageByteSize){
    $image = $_FILES[$imageInput];

    $imageName = $_FILES[$imageInput]['name'];
    $imageTmpName = $_FILES[$imageInput]['tmp_name'];
    $imageSize = $_FILES[$imageInput]['size'];
    $imageError = $_FILES[$imageInput]['error'];
    $imageType = $_FILES[$imageInput]['type'];

    $imageExt = explode('.', $imageName);
    $imageActualExt = strtolower(end($imageExt));

    $allowed = array('jpg', 'jpeg', 'png', 'pdf');

    if(in_array($imageActualExt, $allowed)){
        if($imageError === 0){
            if($imageSize < $imageByteSize){
                $imageNameNew = uniqid('', true).".".$imageActualExt;
                $imageDestination = $folder.basename($imageNameNew);
                //maybe not basename

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
    return $imageNameNew;
    
}

