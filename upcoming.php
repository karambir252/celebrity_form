<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Upcoming Celebrities</title>
    
    <link rel="stylesheet" href="css/skel.css" />
    <link rel="stylesheet" href="css/style.css" />
    
</head>
<body class="homepage">
    

        <?php include('header.php')?>
        <?php
            require_once('dbhelper.php');
            $db = new SQLiteDb();
            
            $allArrivals = $db->getAllArrivals();
        ?>
        
        <div class="wrapper style5">
				<section id="team" class="container">
					<div class="row">
                        <?php
                            while($arrival = $allArrivals->fetchArray()){
                        ?>
						<div class="3u" style="height: 450px;">
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

        <?php
            $db->close();
        ?>
        <?php include('footer.php')?>
    
    
</body>
</html>