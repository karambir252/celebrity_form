<?php session_start(); ?>

<?php
    
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
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['user_id'] = 123;
        $_SESSION['user_name'] = $name;
        $_SESSION['user_email'] = $email;
        $password=$_POST['password'];
      
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
     
        <div style="width: 400px; margin: auto;"  >
          <table style="font-size: 20px ">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
          <tr><td> USER  NAME</td><td> <input type="text" name="name" value="USER NAME" ></td></tr>
                        <span style="color: #f00"><?php echo $nameerror ;?></span>
            <tr><td>      EMAIL ID</td><td><input type="email" name="email" value="EMAIL"></td>
                       <span style="color: #f00"><?php echo $emailerror ;?></span>
        <tr><td> PASSWORD</td><td><input type="password" name="password" value="MUST BE 8 DIGIT"></td></tr>
                       <span style="color: #f00"><?php echo $passworderror ;?></span>
            <tr><td>   CONFIRM PASSWORD</td><td><input type="password" name="cpassword" value="RE-ENTER PASSWORD"></td></tr>
                           <span style="color: #f00"><?php echo $cpassworderror ;?></span>
               <tr><td> <input type="SUBMIT" value="SUBMIT" ></td></tr>
           </form>
              </table>
       </div>
            <?php include('footer.php') ?>

</body>
</html>