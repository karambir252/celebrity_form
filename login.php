<?php session_start(); ?>

<?php
    $login_error = '';
    if(isset($_POST['email']) && $_POST['email'] != ''){
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        require_once('dbhelper.php');
        $db = new SQLiteDb();
        $result = $db->hasUser($email,$password);
        
        if($data = $result->fetchArray()){
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['user_id'] = $data['_id'];
            $_SESSION['user_name'] = $data['name'];
            $_SESSION['user_email'] = $data['email'];
            
            $db->close();
            header('Location: index.php');
            die();
        }else{
            $login_error = 'Incorrect username or password';
        }
        
        $db->close();
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Log In</title>
		<link rel="stylesheet" href="css/skel.css" />
        <link rel="stylesheet" href="css/style.css" />
	</head>
	<body>
    
        <?php include('header.php') ?>
        
        <div class="wrapper style2" style="padding-left: 6em; padding-right: 6em;">
                <section class="container" style="padding-left: 24em; padding-right: 24em;">
                    <form method="post" action="login.php">
                    <table>
                        <tr>
                            <td>
                                <h3>Email:</h3>
                            </td>
                            <td>
                                <input type="text"  name="email"  />
                            </td>
                        </tr>
                        <tr >
                            <td>
                                <h3>Password:</h3>
                            </td>
                            <td>
                                <input type="password" name="password" /> 
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" >
                                <div style="margin-top: 1em;">
                                <input type="submit" value="Login" style="width: 100%;"/>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" >
                                <div style="margin-top: 1em;">
                                <a class="button" href="signup.php" style="width: 100%;"> SIGN UP</a>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <td colspan="2">
                                <div style="margin-top: 1em;">
                                <h3 style="color : red;"><?php echo $login_error; ?></h3>
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
                </section>
            </div>
           
            <?php include('footer.php') ?>

</body>
</html>