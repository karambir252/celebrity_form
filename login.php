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

<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Celebrity Form</title>
		<link rel="stylesheet" href="css/style.css" type="text/css" />
		
	</head>
	<body>
		
			<?php include('header.php') ?>
       
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
                     </table>
    </form>
            </div>
           
            <?php include('footer.php') ?>

</body>
</html>