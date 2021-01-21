<?php
    require_once '../functions/functions.php';
    if(isset($_POST['submit-signup'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    
        $saveData = [
            'username' => $username,
            'email' => $email,
            'password' => $password,
        ];
    
        saveToDB($pdo, 'users', $saveData);

        header('Location: ../index.html');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The blog</title>
    <link rel="stylesheet" href="../css/login-style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="center">
        <h1>Signup</h1>
        <form method="post">
            <div class="txt_field">
                <input type="text" name="username" value="" required>
                <span></span>
                <label for="">Username</label>
            </div>
            <div class="txt_field">
                <input type="email" name="email" value="" required>
                <span></span>
                <label for="">Email</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password" value="" required>
                <span></span>
                <label for="">Password</label>
            </div>
            
            <input type="submit" name="submit-signup" value="Signup">
            <div class="signup_link">
                Already a member <a href="../index.html">Login</a>
            </div>
        </form>

    </div>
</body>
</html>