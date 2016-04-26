<?php session_start(); ?>

<?php
    if(isset($_POST['email']) && $_POST['email'] != ''){
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['user_id'] = 7;
        $_SESSION['user_name'] = 'karambir';
        $_SESSION['user_email'] = 'karambir2522@gmail.com';
        header('Location: index.php');
        die();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Log in</title>
    
    <link rel="stylesheet" href="css/style.css" type="text/css" />   
</head>
<body>
    <form method="post" action="login.php">
        <input type="text" name="email" />
        <br />
        <input type="password" name="password" />
        <br />
        <input type="submit" value="Log in" />
    </form>
</body>
</html>