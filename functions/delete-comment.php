<?php

session_start();

require_once 'functions.php';

$userid = $_SESSION['user']['id'];
if(isset($_GET['delete-comment'])){
    $id = $_GET['delete-comment'];

    deleteColumnFromDB($pdo, 'comments', $id);
    header("location: ../pages/profile.php?user=$userid");

}