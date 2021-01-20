<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require 'header.php';

?>



<main>
    <div class="main-container">
        <div class="contant">
        <h2>Profile</h2>

        <p>Your email: <?php echo $_SESSION['user']['email'] ?></p>
        </div>
        <aside class="side-bar">
            <ul>
                <li><a href="settings.php">Settings</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Settings</a></li>
                <li><a href="#">Settings</a></li>
            </ul>
        </aside>
    </div>
</main>
</body>
</html>