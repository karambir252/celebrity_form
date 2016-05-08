<?php 
    session_start(); 
    require_once('dbhelper.php');
    require_once('utils.php');
    $db = new SQLiteDb();
    
    if(isset($_GET['arrival_id']) && $_GET['arrival_id']){
        $arrival_id = $_GET['arrival_id'];
        $arrival = $db->getArrival($arrival_id);
    }else{
        $arrival = $db->getNextArrival();
        $arrival_id = $arrival['_id'];
    }
?>
<!DOCTYPE html>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Questions</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		
		
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
		
		
	</head>
	<body class="homepage">
		
			<?php include('header.php') ?>
            
            <div class="wrapper style3" >
                <img src="images/arrival/<?php echo $arrival_id; ?>.jpg" alt="celebrity pic"
                            style=" margin : 1em ;border-radius: 50%; border: 8px solid white;" />
				<section class="container">
					<header class="major">
						<h2><?php echo $arrival['celebrity_name']; ?></h2>
					</header>
                    <blockquote style="padding : 0em 12em 0em 12em;"><?php echo $arrival['message']; ?></blockquote>
                    <?php 
                        if(!isLoggedIn()){
                            $url = 'blog.php?arrival_id=' . $arrival_id;
                            echo '<a href="login.php?url='. $url . ' class="button alt">Login to like questions</a>';
                        }
                    ?>
    				
				</section>
			</div>
            
			<div class="wrapper style4">
				<section class="container">
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
                        $all_questions = $db->getAllQuestions($arrival_id);
                        $num_of_ques = 0;
                        while($ques = $all_questions->fetchArray()){
                            
                            
                                echo '<div class="4u">';
                                echo '<ul class="special-icons">';
                            
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
                        
                                echo '</ul>';
                                echo '</div>';
                            
                        }
                    ?>
                    </div>
				</section>
			</div>
            
			<?php 
                include('footer.php');
                $db->close();
            ?>
		
	</body>
</html>  
