<?php
require_once 'functions.php';

if(isset($_GET['delete-comment'])){
    $id = $_GET['delete-comment'];
    $sql = 'DELETE FROM comments WHERE id=:id';
    $statement = $pdo->prepare($sql);
    $statement->execute(array(":id"=>$id));
    
}