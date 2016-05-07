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
            
            <?php
                require_once('dbhelper.php');
                $db = new SQLiteDb();
                $nextArrivals = $db->getLastFourArrivals();
                $arrival = $nextArrivals->fetchArray();
            ?>
			<div class="body">
				<div id="featured">
                    <img src="images/arrival_large/<?php echo $arrival['_id']; ?>.jpg" alt="next celebrity pic" style="border-radius: 50%; float: right" />
					<h3>Celebrity Name</h3>
					<p><?php echo $arrival['message']; ?></p>
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
                    <?php
                        while($arrival = $nextArrivals->fetchArray()){
                    ?>
					<li>
						<div>
							<a href="<?php echo 'blog.php?arrival_id=' . $arrival['_id']; ?>">
                                <img src="images/arrival/<?php echo $arrival['_id'];?>.jpg" alt=""/></a>
							<p><?php echo $arrival['message']; ?></p>
						</div>
					</li>
                    <?php
                        }
                    ?>
				</ul>
			</div>
            <?php
                $db->close();
            ?>
			<?php include('footer.php') ?>
		</div>
	</body>
</html>  
