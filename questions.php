<?php session_start(); ?>

<?php
    if(isset($_POST['question']) && $_POST['question']){
        $ques = $_POST['question'];
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
                $all_questions = array(
                                array('question'=>'How Are you?','answer'=>'I am fine.'),
                                array('question'=>'How Are you?','answer'=>'I am fine.'),
                                array('question'=>'How Are you?','answer'=>'I am fine.'),
                                array('question'=>'How Are you?','answer'=>'I am fine.'),
                                array('question'=>'How Are you?','answer'=>'I am fine.'),
                            );

                foreach($all_questions as $question){
            ?>

            <h3><?php echo $question['question']; ?></h3>
            <p><?php echo $question['answer']; ?></p>

            <?php
                }
            ?>
            
        </div>

        <?php include('footer.php')?>
    
    </div>
</body>
</html>