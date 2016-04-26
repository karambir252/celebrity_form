<?php
    session_start();

    if(isset($_POST['message'])){
        $t = time();
        $message = $_POST['message'];

        require_once('dbhelper.php');
        $db = new SqliteDb();

        $db->addArrival($t,0,$message);

        echo 'Your response is submitted: <br />';
        echo date('d m y',$t) . '<br />';
        echo $message . '<br />';
        die();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add upcoming</title>
</head>
<body>
    <form action="addUpcoming.php" method="post">
        <label>Message: </label>
        <br />
        <textArea name="message" rows="10" cols="50"></textArea>
        <br />
        <input type="submit" value="submit" />
    </form>
</body>
</html>