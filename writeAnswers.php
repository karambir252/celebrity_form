<?php session_start(); ?>

<?php
    require_once('dbhelper.php');

    $db = new SqliteDb();

    if(isset($_POST['question_id']) && $_POST['question_id'] && $_POST['answer']){
        $ans = $_POST['answer'];
        $question_id = $_POST['question_id'];
        $result = $db->addAnswer($question_id,$ans);
        if(!$result){
            die('error in inserting answer');
        }
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
                $question = $db->getSingleQuestion();
                
                if(!$question){
                    echo '<h1>No Question left</h1>';
                }else{
            ?>
            
                <form action="writeAnswers.php" method="post">
                    <?php echo '<h3>' . $question['question'] . '</h3>'; ?>
                    <textarea name="answer" rows="10" cols="50"></textarea> <br />
                    <input type="hidden" name="question_id" value="<?php echo $question['_id']; ?>" />
                    <input type="submit" value="submit" />
                </form>
            
            <?php } ?>
            
        </div>

        <?php 
            include('footer.php');
            $db->close();
        ?>
    
    </div>
</body>
</html>