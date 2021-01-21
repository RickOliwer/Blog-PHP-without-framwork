<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    require 'header.php';
    require_once 'functions.php';
?>

<div class="center">
    <?php if(isset($_GET['user'])) : ?>
        <h1>New Post</h1>
        <form method="POST" enctype="multipart/form-data">

            <div class="txt_field">
                <input type="text" name="title" value="" require>
                <span></span>
                <label for="">Title</label>
            </div> 
            <div class="txt_field">
                <input type="file" name="image" value="">

            </div>
            
                <textarea name="textarea" require></textarea>
                
                <label for="">Description</label>
            
            
            <input type="submit" name="add-post-submit" value="Add Post">
            <div class="signup_link">
                Lorem ipsum dolor sit amet consectetur adipisicing <a href="#">Read more</a>
            </div>
            <input type="hidden" value="<?php echo $_GET['user'] ?>" name="user_id" />
        </form>
    <?php endif ; ?>
    </div>
</body>
</html>