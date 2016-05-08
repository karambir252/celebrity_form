<?php session_start();
    require('dbhelper.php');
    require('utils.php');
    
    if(!isLoggedIn()){
        die('Please log in');
    }
    
    if(!isset($_GET['question_id']) && $_GET['question_id']){
        die('Not question id');
    }
    
    $question_id = $_GET['question_id'];
    $user_id = $_SESSION['user_id'];
    
    $db = new SQLiteDb();
    
    if(isset($_GET['like']) && $_GET['like']){
        $db->setUserLike($user_id,$question_id);
    }else{
        $db->unsertUserLike($user_id,$question_id);
    }
    
    $db->close();
?>