<?php 
    require_once '../header/newheader.php';
    require_once '../functions/add-posts-code.php';
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
           
                <input type="file" name="image" value="" require>

            
            <div class="txt_field">
                <textarea name="textarea" require></textarea>
                
                <label for="">Description</label>
            </div>
            
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