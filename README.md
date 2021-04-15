# The Blog


This is a blog I made in PHP without using any framwork or packages

# Getting started:

All you have to do is to import the blog_2021-01-30.sql file into your phpMyAdmin.
And the app should work

You might have to edit in the database/dbconfig.php file if you're using for exemple a password.

<?php

$database = [
    'host' => '127.0.0.1',
    'dbname' => 'blog',
    'username' => 'root',
    'password' => '',
];