<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require '../header/newheader.php';
//require_once 'phpmysqlconnect.php';
require_once '../functions/functions.php';

if(isset($_POST['submit_new_email']) && $_SESSION['token'] == $_POST['token']){
    if(time() >= $_SESSION['token-expire']){
        exit("Token expired. Please reload form.");
    }

    if(isset($_POST['old_password']) == $_SESSION['user']['password']){

    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $id = $_SESSION['user']['id'];

    $saveData = [
        'email' => $email,
        'password' => $password,
        'id' => $id,
    ];
    updateDB($pdo, 'users', $saveData);

    } else {
        exit("wrong password!");
    }

} else {
    $_SESSION['token'] = bin2hex(random_bytes(32));
    $_SESSION['token-expire'] = time() + 600;
}

?>

<h2>Settings</h2>

<div class="center">
        <h1>Security & Inlogg Information</h1>
        <form method="post">

            <div class="txt_field">
                <input type="email" name="email" value="" required>
                <span></span>
                <label for="">New email</label>
                <input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?>" />
            </div>
            <div class="txt_field">
                <input type="password" name="old_password" value="" required>
                <span></span>
                <label for="">Old password</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password" value="" required>
                <span></span>
                <label for="">New password</label>
            </div>
            
            <input type="submit" name="submit_new_email" value="Change">
            <div class="signup_link">
                Lorem ipsum dolor sit amet consectetur adipisicing <a href="index.html">Read more</a>
            </div>
        </form>

    </div>
</body>
</html>