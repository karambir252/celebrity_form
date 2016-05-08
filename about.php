<?php session_start(); 
    $feedback_submitted = false;
    
    require_once('utils.php');
    
    if(isSet($_POST['feedback']) && $_POST['feedback']){
        $feedback = $_POST['feedback'];
        if(isLoggedIn){
            $user_id = $_SESSION['user_id'];
            $user_name = $_SESSION['user_name'];
            $user_email = $_SESSION['user_email'];
        }
        
        //mail feedback to you
        
        header('Location: index.php');
        die();
    }
?>

<!DOCTYPE html>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>About</title>
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
		</noscript>
		
	</head>
	<body class="homepage">
		
			<?php include('header.php') ?>
            
            <div class="wrapper style2" style="padding-left: 6em; padding-right: 6em;">
                <section class="container">
                    <form method="post" action="about.php">
                    <table>
                        <tr>
                            <td>
                                <h3>Feedback:</h3>
                            </td>
                        </tr>
                        <tr >
                            <td>
                                <textarea rows="8" cols="25" name="feedback"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" value="Submit feedback" style="width: 100%;"/>
                            </td>
                        </tr>
                    </table>
                </form>
                </section>
            </div>
            
            <div class="wrapper style2">
				<section class="container">
					<div class="row double">
						<div class="6u">
							<header class="major">
								<h2>What we do?</h2>
								<p>We invite celebrities from different fields.
                                We invite new celebrity on weekend. You can ask any questions regarding their fields
                                , experience , success stories , daily life and any doubts in your mind.
                                Celebrites answer your questions one by one.</p>
							</header>
						</div>
						<div class="6u">
							<h3>About questions</h3>
							<p>Questions should be straight forward and point to point.
                            As their are many users he/she may be not able to answer your question.
                            We tried to provide best service but you should ask good questions. 
                            Before asking any question double check that your question are not already 
                            being asked by other users.</p>
						</div>
					</div>
				</section>
			</div>
            
            <div class="wrapper style2">
				<section class="container">
					<div class="row double">
						<div class="6u">
							<header class="major">
								<h2>Bugs</h2>
								<p>If you encounter any bug please report that at 
                                <a href="#">report bug</a></p>
							</header>
						</div>
						<div class="6u">
							<h3>Contact us</h3>
				            <p>Mobile: +91-8888888888</p>

				            <h3>Address</h3>
				            <p>Delhi Technological University , <br />
					           Shahbad Daultpur , <br />
					           Main Bawana Road 
				            </p>
						</div>
					</div>
				</section>
			</div>
                
			<?php include('footer.php')?>
		
	</body>
</html>  
