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
    <title>Write Answers</title>
    <link rel="stylesheet" href="css/skel.css" />
    <link rel="stylesheet" href="css/style.css" />
</head>
<body class="homepage">
    

        <?php include('header.php')?>

        
            
            <?php
                $question = $db->getSingleQuestion();
                
                if(!$question){
                    echo '<h1>No Question left</h1>';
                }else{
            ?>
            
            <div class="wrapper style2" style="padding-left: 6em; padding-right: 6em;">
                <section class="container">
                    <form method="post" action="writeAnswers.php">
                    <table>
                        <tr>
                            <td>
                                <?php echo '<h3>' . $question['question'] . '</h3>'; ?>
                            </td>
                        </tr>
                        <tr >
                            <td>
                                <textarea rows="8" cols="25" name="answer"></textarea>
                                <input type="hidden" name="question_id" value="<?php echo $question['_id']; ?>" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" value="Submit Answer" style="width: 100%;"/>
                            </td>
                        </tr>
                    </table>
                </form>
                </section>
            </div>
            
            <?php } ?>
            
        

        <?php 
            include('footer.php');
            $db->close();
        ?>
    
    </div>
</body>
</html>