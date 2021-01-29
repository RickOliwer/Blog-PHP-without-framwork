<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../header/newheader.php';
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

// if(isset($_POST['profile_submit'])){
//     $Profileimage = $_FILES['profile_image'];

//     $profileImageName = $_FILES['profile_image']['name'];
//     $profileImageTmpName = $_FILES['profile_image']['tmp_name'];
//     $profileImageSize = $_FILES['profile_image']['size'];
//     $profileImageError = $_FILES['profile_image']['error'];
//     $profileImageType = $_FILES['profile_image']['type'];

//     $profileImageExt = explode('.', $profileImageName);
//     $profileImageActualExt = strtolower(end($profileImageExt));

//     $profileAllowed = array('jpg', 'jpeg', 'png', 'pdf');

//     if(in_array($profileImageActualExt, $profileAllowed)){
//         if($profileImageError === 0){
//             if($profileImageSize < 1000000){
//                 $profileImageNameNew = uniqid('', true).".".$profileImageActualExt;
//                 $imageDestination = '../profileimages/'.basename($profileImageNameNew);
//                 $saveData = [
//                     'f_name' => $f_name = $_POST['f_name'],
//                     'l_name' => $l_name = $_POST['l_name'],
//                     'profile_image' => $profileImageNameNew,
//                     'id' => $id = $_SESSION['user']['id'],
//                 ];
//                 updateProfile($pdo, 'users', $saveData);
//                 if (move_uploaded_file($profileImageTmpName, $imageDestination)) {
//                     echo "Image uploaded successfully";
//                 } else {
//                     echo "error";
//                 }

//             } else {
//                 echo "Your file is to big";
//             }
//         } else {
//             echo "there was an error uploading your file!"; 
//         }
//     } else {
//         echo "You cannot upload files of this type";
//     }
    

    

//     header('Location: profile.php');
// }

if(isset($_POST['profile_submit'])){
    $imageInput = 'profile_image';
    $folder = '../profileimages/';
    $imageName = addImageToFolder($imageInput, $folder);

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
<h2>Settings</h2>

<div>
    
    <?php if(isset($_GET['user'])) : ?>
        <h1>Profile Settings</h1>
        <form method="POST" enctype="multipart/form-data">

            <div>
                <input type="text" name="f_name" value="" require>
                <span></span>
                <label for="">First name</label>
            </div> 
            <div>
                <input type="text" name="l_name" value="" require>
                <span></span>
                <label for="">Last name</label>
            </div> 
            <div>
                <input type="file" name="profile_image" value="">

            </div>
            
                <textarea name="description"></textarea>
                
                <label for="">Description</label>
            
            
            <input type="submit" name="profile_submit" value="Changes Profil">
            <div>
                Lorem ipsum dolor sit amet consectetur adipisicing <a href="#">Read more</a>
            </div>
            <input type="hidden" value="<?php echo $_GET['user'] ?>" name="user_id" />
        </form>
    <?php endif ; ?>

        <h1>Security & Inlogg Information</h1>
        <form method="post">

            <div>
                <input type="email" name="email" value="" required>
                <span></span>
                <label for="">New email</label>
                <input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?>" />
            </div>
            <div>
                <input type="password" name="old_password" value="" required>
                <span></span>
                <label for="">Old password</label>
            </div>
            <div>
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