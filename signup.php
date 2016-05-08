<?php session_start(); ?>

<?php
    
    $nameerror = $emailerror = $passworderror = $cpassworderror = '';
    $dpassword = FALSE;
    
       if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameerror = "Name is required";
     $dname=FALSE;
      }
    else {
     $name = test_input($_POST["name"]);
     // check if name only contains letters and whitespace
     $dname=TRUE;
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameerror = "Only letters and white space allowed"; 
        $dname=FALSE;

     }
   }
    

     if (empty($_POST["email"])) {
     $emailerror = "Email is required";
     
   } else {
     $email = test_input($_POST["email"]);
     // check if e-mail address is well-formed
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailerror = "Invalid email format"; 
     
     }}

     if(empty($_POST["password"]))
     {
         $passworderror="Password must be of 8 digit ";
          $dpassword=FALSE;
        }
       elseif(empty($_POST["cpassword"]))
            {
             $cpassworderror="Password must be of 8 digit ";   
            $dpassword=FALSE;
            }

        else{
            if($_POST["password"]!=$_POST["cpassword"])
            {
           $cpassworderror=  $passworderror="Password did not match";   
         $dpassword=FALSE;
            }
            else
            {
            $dpassword=TRUE;    
            }
        }

    }    
    function test_input($data)
    {
        $data = trim($data);
        $data =stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }
    
    if($dpassword&&$dname) {
        
        require_once('dbhelper.php');
        
        $db = new SQLiteDb();
        $id = $db->addUser($name,$email,$_POST['password']);
        $db->close();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['user_id'] = $id;
        $_SESSION['user_name'] = $name;
        $_SESSION['user_email'] = $email;
        $password=$_POST['password'];
      
        header('Location: index.php');
        die();
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Sign Up</title>
		<link rel="stylesheet" href="css/skel.css" />
        <link rel="stylesheet" href="css/style.css" />
		
	</head>
	<body>
    
	<?php include('header.php') ?>
                    
     <div class="wrapper style2" style="padding-left: 6em; padding-right: 6em;">
                <section class="container" style="padding-left: 20em; padding-right: 20em;">
                    <form method="post" action="signup.php">
                    <table>
                        <tr>
                            <td>
                                <h3>User Name:</h3>
                            </td>
                            <td>
                                <input type="text"  name="name"  />
                                <span style="color: #f00"><?php echo $nameerror ;?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3>Email:</h3>
                            </td>
                            <td>
                                <input type="text"  name="email"  />
                                <span style="color: #f00"><?php echo $emailerror ;?></span>
                            </td>
                        </tr>
                        <tr >
                            <td>
                                <h3>Password:</h3>
                            </td>
                            <td>
                                <input type="password" name="password" />
                                <span style="color: #f00"><?php echo $passworderror ;?></span>
                            </td>
                        </tr>
                        <tr >
                            <td>
                                <h3>Confirm Password:</h3>
                            </td>
                            <td>
                                <input type="password" name="cpassword" /> 
                                <span style="color: #f00"><?php echo $cpassworderror ;?></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" >
                                <div style="margin-top: 1em;">
                                <input type="submit" value="Sign Up" style="width: 100%;"/>
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