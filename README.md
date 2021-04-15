# The Blog

This is a blog I made in PHP without using any framwork or packages

# Getting started:

All you have to do is to import the blog_2021-01-30.sql file into your phpMyAdmin and the app should work

You might have to edit the database/dbconfig.php file if you're using for example a password.


```
$database = [
    'host' => '127.0.0.1',
    'dbname' => 'blog',
    'username' => 'root',
    'password' => '',
];
```

If you are getting an error when uploading an image you have to give full permission on the profileimages and images folder. This is usually an mac or XAMPP issue.