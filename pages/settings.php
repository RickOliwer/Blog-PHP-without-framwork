<?php
require '../header/newheader.php';
require_once '../functions/functions.php';

if(isset($_POST['submit_new_email']) && $_SESSION['token'] == $_POST['token']){
    if(time() >= $_SESSION['token-expire']){
        exit("Token expired. Please reload form.");
    }

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
    $_SESSION['token'] = bin2hex(random_bytes(32));
    $_SESSION['token-expire'] = time() + 600;
}

if(isset($_POST['profile_submit'])){
    $imageInput = 'profile_image';
    $folder = '../profileimages/';
    $imageByteSize = 5000000;
    $imageName = addImageToFolder($imageInput, $folder, $imageByteSize);

    $saveData = [
        'f_name' => $f_name = $_POST['f_name'],
        'l_name' => $l_name = $_POST['l_name'],
        'profile_image' => $imageName,
        'id' => $id = $_SESSION['user']['id'],
    ];
    updateProfile($pdo, 'users', $saveData);
    
}

?>

<main>
<div class="main-container">
        <div class="contant">
<h2 class="page-title">Settings</h2>

<div class="center-settings">

    <?php if(isset($_GET['user'])) : ?>
        <h1>Profile Settings</h1>
        <form method="POST" enctype="multipart/form-data">

            <div class="txt_field">
                <input type="text" name="f_name" value="" require>
                <span></span>
                <label for="">First name</label>
            </div> 
            <div class="txt_field">
                <input type="text" name="l_name" value="" require>
                <span></span>
                <label for="">Last name</label>
            </div> 
            <div class="txt_field">
                <input type="file" name="profile_image" value="" required>

            </div>
            
            <input type="submit" name="profile_submit" value="Changes Profil">

            <input type="hidden" value="<?php echo $_GET['user'] ?>" name="user_id" />
        </form>
    <?php endif ; ?>

        <h1>Security & Inlogg Information</h1>
        <form method="post">

            <div class="txt_field">
                <input type="email" name="email" value="" required>
                <span></span>
                <label for="">New email</label>
                <input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?>" />
            </div>
            <div class="txt_field">
                <input type="password" name="password" value="" required>
                <span></span>
                <label for="">New password</label>
            </div>
            
            <input type="submit" name="submit_new_email" value="Change">
            <div>
                Lorem ipsum dolor sit amet consectetur adipisicing <a href="index.html">Read more</a>
            </div>
        </form>

    </div>
    </div>
    </div>
    </main>
</body>
</html>
