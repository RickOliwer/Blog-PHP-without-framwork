<?php
require_once 'functions.php';


if(isset($_GET['delete-comment'])){
    $id = $_GET['delete-comment'];

    deleteColumnFromDB($pdo, 'comments', $id);


}