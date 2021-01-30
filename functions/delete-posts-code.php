<?php
session_start();

require_once 'functions.php';

$userid = $_SESSION['user']['id'];
if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    deleteColumnFromDB($pdo, 'posts', $id);
    header("location: ../pages/profile.php?user=$userid");
}
