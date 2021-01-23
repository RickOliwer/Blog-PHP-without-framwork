<?php
require_once 'functions.php';

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $sql = 'DELETE FROM posts WHERE id=:id';
    $statement = $pdo->prepare($sql);
    $statement->execute(array(":id"=>$id));
    
}