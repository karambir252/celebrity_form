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
		<title>Celebrity Form</title>
		<link rel="stylesheet" href="css/style.css" type="text/css" />
		
	</head>
	<body>
    
    <div class="page">
		
			<?php include('header.php') ?>
   <div class="body">
       
        <div style="width: 200px; margin: auto;"  >
                <form method="post" action="login.php">
                     <table border="0" cellpadding="10px" style="font-size: 20px">
    <tr > 
        
        <td> EMAIL   </td>
       <td> <input type="text"  name="email"  /></td> 
    </tr>
       
    <tr><td>  PASSWORD  </td>
            <td><input type="password" name="password" /> </td>    
    </tr>
        
      <tr><td>   <input type="submit"value="Log in" />
          </td>
          <td>
             <a href="SIGNUP.PHP"> SIGN-UP</a>
              </font>
          </td>
      </tr>
      
      <tr>
        <td colspan="2"><?php echo $login_error ?></td>
      </tr>
                     </table>
    </form>
            </div>
            
    </div>
           
            <?php include('footer.php') ?>
            
    </div>

</body>
</html>