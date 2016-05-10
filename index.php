<?php session_start(); ?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Celebrity Form</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="css/skel.css" />
		<link rel="stylesheet" href="css/style.css" />
		
	</head>
	<body class="homepage">

		<?php include('header.php'); ?>
        
        <?php
                require_once('utils.php');
                require_once('dbhelper.php');
                $db = new SQLiteDb();
                $nextArrivals = $db->getLastFiveArrivals();
                $arrival = $nextArrivals->fetchArray();
                $next_arrival_id = $arrival['_id'];
        ?>
        
        <div class="wrapper style3" style="background: rgba(0,0,0,0);">						
		      <img id="banner_img" src="images/banner.png"  />
		</div>
		
		<!-- Section One -->
			<div class="wrapper style2">
				<section class="container">
					<div class="row double">
						<div class="6u">
							<header class="major">
								<h2>What we do?</h2>
								<span class="byline">Wanna ask question to your favourite celebrity.
                                    We are here for help.</span>
							</header>
						</div>
						<div class="6u">
							<h3>Feedback form</h3>
							<p>Your feedback is important for us. Please fill our feedback form. 
                                It will take only few minutes.</p>
							<a href="about.php" class="button">Give Feedback</a>
						</div>
					</div>
				</section>
			</div>

		<!-- Section Two -->
			<div class="wrapper style3">
                <img src="images/arrival/<?php echo $arrival['_id']; ?>.jpg" alt="next celebrity pic" style=" margin : 1em ;border-radius: 50%; border: 8px solid white;" />
				<section class="container">
					<header class="major">
						<h2><?php echo $arrival['celebrity_name']; ?></h2>
					</header>
                    <blockquote style="padding : 0em 12em 0em 12em;"><?php echo $arrival['message']; ?></blockquote>
                    <?php 
                        if(isLoggedIn()){
					        //echo '<input type="button" value="Ask Question" onClick=""/>';
                     ?>
                    <form method="post" action="questions.php">
                        <textarea name="question" rows="5" cols="30" style="border: 5px solid white;">
                                </textarea>
                        <br />
                        <input type="submit" value="Ask Question" class="button alt"/>
                    </form>
                    <?php
                        }else{
                            echo '<a href="login.php" class="button alt">Login to ask question</a>';
                        }
                    ?>
				    
				</section>
			</div>

		<!-- Section Three -->
			<div class="wrapper style4">
				<section class="container">
					<header class="major">
						<h2>Your Favourite Questions</h2>
					</header>
                    <div class="row flush">
                        <script>
                                    function likeClicked(element){
                                        var like_text = element.children[2];
                                        var likes = element.children[3];
                                        var ques_id = parseInt(element.children[4].innerHTML.trim(),10);
                                        
                                        //window.location = 'like.php?question_id=86';
                                        //like_text.innerHTML = 'hello';
                                        //likes.innerHTML = 'hello';
                                        ///*
                                        xhttp = new XMLHttpRequest();
                                        if(like_text.innerHTML.trim() == 'Like'){
                                            element.children[1].style.display = 'none';
                                            element.children[0].style.display = 'inline';
                                            like_text.innerHTML = 'UnLike';
                                            likes.innerHTML = parseInt(likes.innerHTML,10)+1;
                                            xhttp.open("GET","like.php?like=true&question_id="+ques_id,true);
                                        }else{
                                            element.children[1].style.display = 'inline';
                                            element.children[0].style.display = 'none';
                                            like_text.innerHTML = 'Like';
                                            likes.innerHTML = parseInt(likes.innerHTML,10)-1;
                                            xhttp.open("GET","like.php?question_id="+ques_id,true);
                                        }
                                        
                                        xhttp.send();
                                        //element.innerHTML = 'hello';*/
                                    }
                              </script>
                    <?php
                        $top_questions = $db->getTopLikedNineQuestions();
                        $num_of_ques = 0;
                        while($ques = $top_questions->fetchArray()){
                            
                            if($num_of_ques % 3 == 0){
                                echo '<div class="4u">';
                                echo '<ul class="special-icons">';
                            }
                    ?>
					
							
					       <li style="position: relative;">
						      <h3><?php echo $ques['question']; ?></h3>
		                      <span><?php echo $ques['answer']; ?></span>
                              <div class="button" style="position : absolute; bottom : 1em; left : 4% ; width: 92%;"
                                    onclick="<?php
                                        if(isLoggedIn()){
                                            echo 'likeClicked(this);';
                                        }else{
                                            echo "window.location='login.php';";
                                        }
                                    ?>" >
                                        <?php
                                            $logged_in = isLoggedIn();
                                            $user_liked = false;
                                            
                                            if($logged_in){
                                                $user_liked = $db->isUserLiked($_SESSION['user_id'],$ques['_id']);
                                                if($user_liked){
                                                    echo '<img src="images/thumb_down.png" style="float : left;"/>';
                                                    echo '<img src="images/thumb_up.png" style="float : left ;display: none"/>';
                                                }else{
                                                    echo '<img src="images/thumb_down.png" style="float : left ; display: none"/>';
                                                    echo '<img src="images/thumb_up.png" style = "float : left; "/>';
                                                }
                                            }else{
                                                echo '<img src="images/thumb_down.png" style="display: none"/>';
                                                echo '<img src="images/thumb_up.png" style = "display: none"/>';
                                            }
                                            
                                            echo '<div style="float : left; margin-left : 1em;" >';
                                            if($logged_in){
                                                if($user_liked){
                                                    echo 'UnLike';
                                                }else{
                                                    echo 'Like';
                                                }
                                            }else{
                                                echo 'Login To Like';
                                            }
                                        ?>
                                    </div>
                                    <div style="float: right;" ><?php echo $ques['likes']; ?></div>
                                    <div style="display: none;"><?php echo $ques['_id']?></div>
                              </div>
							</li>
					
                    <?php
                        if($num_of_ques % 3 == 0){
                                echo '</ul>';
                                echo '</div>';
                            }
                        }
                    ?>
                    </div>
                    <header class="major"><a href="<?php echo 'blog.php'; ?>" class="button" style="margin-top: 2em;">View All Questions</a></header>
				</section>
			</div>
		
		<!-- Team -->
			<div class="wrapper style5">
				<section id="team" class="container">
					<div class="row">
                        <?php
                            while($arrival = $nextArrivals->fetchArray()){
                        ?>
						<div class="3u">
							<a href="<?php echo 'blog.php?arrival_id=' . $arrival['_id']; ?>" class="image">
                                <img src="images/arrival_small/<?php echo $arrival['_id'];?>.jpg" alt="" /></a>
							<h3><?php echo $arrival['celebrity_name']; ?></h3>
							<p><?php echo $arrival['message']; ?></p>
						</div>
                        <?php
                            }
                        ?>
					</div>
				</section>
			</div>

        <?php include('footer.php'); ?>
        <?php
                $db->close();
            ?>
            
	</body>
</html>