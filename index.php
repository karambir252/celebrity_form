
<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Celebrity Form</title>
		<link rel="stylesheet" href="css/style.css" type="text/css" />
		
	</head>
	<body>
		<div class="page">
			<?php include('header.php') ?>
			<div class="body">
				<div id="featured">
                    <img src="images/next_celebrity.jpg" alt="next celebrity pic" style="border-radius: 50%; float: right" />
					<h3>Celebrity Name</h3>
					<p>Write quote of celebirty here.Write quote of celebirty here.Write quote of celebirty here.
						Write quote of celebirty here.Write quote of celebirty here.Write quote of celebirty here.
						Write quote of celebirty here.</p>
                    <?php 
                        if(isLoggedIn()){
					        //echo '<input type="button" value="Ask Question" onClick=""/>';
                     ?>
                    <form method="post" action="questions.php">
                        <textarea name="question" rows="10" cols="58" ></textarea>
                        <br />
                        <input type="submit" value="Ask Question"/>
                    </form>
                    <?php
                        }else{
                            echo '<a href="login.php"><input type="button" value="Log in"/></a>';
                        }
                    ?>
                    
				</div>
				<ul class="blog">
					<li>
						<div>
							<a href="#"><img src="images/cele_1.jpg" alt=""/></a>
							<p>A message about the celebrity goes here.Put here message about celebrity.
								A message about the celebrity goes here.Put here message about celebrity.</p>
						</div>
					</li>
					<li>
						<div>
							<a href="#"><img src="images/cele_2.jpg" alt=""/></a>
							<p>A message about the celebrity goes here.Put here message about celebrity.
								A message about the celebrity goes here.Put here message about celebrity.</p>
						</div>
					</li>
					<li>
						<div>
							<a href="blog.html"><img src="images/cele_3.jpg" alt=""/></a>
							<p>A message about the celebrity goes here.Put here message about celebrity.
								A message about the celebrity goes here.Put here message about celebrity.</p>
						</div>
					</li>
				</ul>
			</div>
			<?php include('footer.php') ?>
		</div>
	</body>
</html>  
