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
						<img src="images/logo.png"/>
						
						<!-- Nav -->
							<nav id="nav" style="float :right">
								<ul>
									<?php
                                        if($logged_in){
                                            echo '<li class="active"><a href="index.php">Home</a></li>';
                                            echo '<li><a href="questions.php">My Questions</a></li>';
                                            echo '<li><a href="upcoming.php">Celebrities</a></li>';
                                            echo '<li><a href="blog.php">Questions</a></li>';
                                            echo '<li><a href="about.php">About</a></li>';
                                        }else{
                                            echo '<li><a href="index.php">Home</a></li>';
                                            echo '<li><a href="login.php">My Questions</a></li>';
                                            echo '<li><a href="upcoming.php">Celebrities</a></li>';
                                            echo '<li><a href="blog.php">Questions</a></li>';
                                            echo '<li><a href="about.php">About</a></li>';
                                        }
                                    ?>
								</ul>
							</nav>
	
					</div>
				</div>

			</div>
            <!--
            <div class="windows8">
	<div class="wBall" id="wBall_1">
		<div class="wInnerBall"></div>
	</div>
	<div class="wBall" id="wBall_2">
		<div class="wInnerBall"></div>
	</div>
	<div class="wBall" id="wBall_3">
		<div class="wInnerBall"></div>
	</div>
	<div class="wBall" id="wBall_4">
		<div class="wInnerBall"></div>
	</div>
	<div class="wBall" id="wBall_5">
		<div class="wInnerBall"></div>
	</div>
</div>
   -->  
   <!--
   <div id="fountainG">
	<div id="fountainG_1" class="fountainG"></div>
	<div id="fountainG_2" class="fountainG"></div>
	<div id="fountainG_3" class="fountainG"></div>
	<div id="fountainG_4" class="fountainG"></div>
	<div id="fountainG_5" class="fountainG"></div>
	<div id="fountainG_6" class="fountainG"></div>
	<div id="fountainG_7" class="fountainG"></div>
	<div id="fountainG_8" class="fountainG"></div>
</div>
-->

       
            <?php
                
                if(!endsWith($_SERVER['SCRIPT_NAME'],'login.php')){
                if($logged_in){
                   $img_path = 'images/users/'. $_SESSION['user_id']. '.jpg';
                   $img_title = 'logout ( '. $_SESSION['user_name'] . ' )"';
                   $img_href = 'logout.php';
                }else{
                    $img_path = 'images/placeholder.png';
                    $img_title = 'login';
                    $img_href='login.php';
                }
                
                echo '<a class = "login_logout_btn" href="'.$img_href.'"><img id = "user_profile_pic" ';
                echo 'src="'. $img_path. '" title="'. $img_title. '"/>' ;
                echo '</a>';
                }
            ?>
            
