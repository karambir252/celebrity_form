<?php
    require_once('utils.php');
    if(isLoggedIn()){
        $logged_in = true;
    }else{
        $logged_in = false;
    }
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<div class="header">
	<a href="index.php" id="logo"><img src="images/logo.png" alt="logo"/></a>
	<ul>
        
            <?php
                if($logged_in){
                    echo '<li><a href="index.php">Home</a></li>';
                    echo '<li><a href="questions.php">Questions</a></li>';
                    echo '<li><a href="upcoming.php">Upcoming</a></li>';
                    echo '<li><a href="blog.php">Blog</a></li>';
                    echo '<li><a href="about.php">About</a></li>';
                    echo '<li><a href="logout.php">Log out (' . $_SESSION['user_name'] . ')</a></li>';
                }else{
                    echo '<li><a href="index.php">Home</a></li>';
                    echo '<li><a href="login.php">Questions</a></li>';
                    echo '<li><a href="upcoming.php">Upcoming</a></li>';
                    echo '<li><a href="blog.php">Blog</a></li>';
                    echo '<li><a href="about.php">About</a></li>';
                    echo '<li><a href="login.php">Log in</a></li>';
                }
            ?>
        
	</ul>
</div>
