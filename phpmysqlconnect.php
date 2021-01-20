<?php

require_once 'dbconfig.php';

function initDatabase($database){
    
    try{
        return new PDO("mysql:host={$database['host']};dbname={$database['dbname']}", $database['username'], $database['password']);
    } catch(PDOException $e){
        return "Could not connect to the database" . $e->getMessage();
    }
}