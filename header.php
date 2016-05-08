<?php
    require_once('utils.php');
    if(isLoggedIn()){
        $logged_in = true;
    }else{
        $logged_in = false;
    }
?>

<!-- Header Wrapper -->
			<div class="wrapper style1">
			
			<!-- Header -->
				<div id="header" style="padding-top: 1em; padding-bottom: 3em;">
					<div class="container" >
							
						<!-- Logo -->
						<img src="images/logo.png" style="float: left" />
						
						<!-- Nav -->
							<nav id="nav" style="float :right">
								<ul>
									<?php
                                        if($logged_in){
                                            echo '<li><a href="index.php">Home</a></li>';
                                            echo '<li><a href="questions.php">My Questions</a></li>';
                                            echo '<li><a href="upcoming.php">Celebrities</a></li>';
                                            echo '<li><a href="blog.php">Questions</a></li>';
                                            echo '<li><a href="about.php">About</a></li>';
                                            echo '<li><a href="logout.php">Log out (' . $_SESSION['user_name'] . ')</a></li>';
                                        }else{
                                            echo '<li><a href="index.php">Home</a></li>';
                                            echo '<li><a href="login.php">My Questions</a></li>';
                                            echo '<li><a href="upcoming.php">Celebrities</a></li>';
                                            echo '<li><a href="blog.php">Questions</a></li>';
                                            echo '<li><a href="about.php">About</a></li>';
                                            echo '<li><a href="login.php">Log in</a></li>';
                                        }
                                    ?>
								</ul>
							</nav>
	
					</div>
				</div>

			</div>
            
<!--
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

<div class="header">
	<a href="index.php" id="logo"><img src="images/logo.png" alt="logo"/></a>
	<ul>
        
            <?php/*
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
                }*/
            ?>
        
	</ul>
</div>

-->
