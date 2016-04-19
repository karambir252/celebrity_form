<?php
    require_once('utils.php');
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<div class="header">
	<a href="index.php" id="logo"><img src="images/logo.png" alt="logo"/></a>
	<ul>
	    <li><a href="index.php">Home</a></li>
        <li><a href="questions.php">Questions</a></li>
        <li><a href="upcoming.php">Upcoming</a></li>
		<li><a href="blog.php">Blog</a></li>
        <li><a href="about.php">About</a></li>
        <li>
            <?php
                if(isLoggedIn()){
                    echo '<a href="logout.php">Log out (' . $_SESSION['user_name'] . ')</a>';
                }else{
                    echo '<a href="login.php">Log in</a>';
                }
            ?>
        </li>
	</ul>
</div>
