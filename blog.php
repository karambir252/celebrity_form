<?php 
    session_start(); 
    require_once('dbhelper.php');
    $db = new SQLiteDb();
    
    if(isset($_GET['arrival_id']) && $_GET['arrival_id']){
        $arrival_id = $_GET['arrival_id'];
    }else{
        $arrival_id = $db->getNextArrivalId();
    }
?>
<!DOCTYPE html>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Blog</title>
		<link rel="stylesheet" href="css/style.css" type="text/css" />
	</head>
	<body>
		<div class="page">
			<?php include('header.php') ?>
			<div class="body">
                <img src="<?php echo 'images/arrival/'. $arrival_id . '.jpg'; ?>" />
				<?php
                    $allQuestions = $db->getAllQuestions($arrival_id);
                    while($question = $allQuestions->fetchArray()){
                ?>
                    <h3><?php echo $question['question']; ?></h3>
                    <p><?php echo $question['answer']; ?></p>
                <?php
                    }
                ?>
			</div>
			<?php 
                include('footer.php');
                $db->close();
            ?>
		</div>
	</body>
</html>  
