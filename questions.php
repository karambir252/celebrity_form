<?php session_start(); ?>

<?php
    require_once('dbhelper.php');

    $db = new SqliteDb();

    if(isset($_POST['question']) && $_POST['question']){
        $ques = $_POST['question'];
        $user_id = $_SESSION['user_id'];
        $db->addQuestion($ques,$db->getNextArrivalId(),$user_id);
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Questions</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
    <div class="page">

        <?php include('header.php')?>

        <div class="body">
            
            <?php
                $db = new SqliteDb();
                $all_questions = $db->getQuestions($_SESSION['user_id']);

                $num_cols = $all_questions->numColumns();

                for($i = 0 ; $i < $num_cols ; $i = $i+1){
                    $question = $all_questions->fetchArray();
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