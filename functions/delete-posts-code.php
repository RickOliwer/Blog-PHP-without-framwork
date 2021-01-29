<?php
require_once 'functions.php';

if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    deleteColumnFromDB($pdo, 'posts', $id);
}
