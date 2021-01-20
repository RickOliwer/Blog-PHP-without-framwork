<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

session_start();

require_once 'phpmysqlconnect.php';

$pdo = initDatabase($database);

$statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
$statement->bindParam('email', $_POST['email']);
$statement->execute();

$user = $statement->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['submit_login']) && password_verify($_POST['password'], $user['password'])){
    session_regenerate_id();
    $_SESSION['logged_in'] = true;
    $_SESSION['user'] = $user;
    //$_SESSION['email'] = $user['email'];
    header('Location: home.php');
} else {
    header('Location: index.html');
}



