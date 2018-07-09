<?php
session_start();

if(isset($_POST['btn-signup'])) {

	require_once 'dbconnect.php';

	// Get form data
	$fname = mysqli_real_escape_string($conn, $_POST['fullname']);
	$bizname = mysqli_real_escape_string($conn, $_POST['businessname']);
	$phone = mysqli_real_escape_string($conn, $_POST['phonenumber']);
	$pass = mysqli_real_escape_string($conn, $_POST['password']);
	
	//Hashing the Password
	$hashed_password = password_hash($pass, PASSWORD_DEFAULT); 
	
	//Insert user into database
	$query = "INSERT INTO agent_account(fullname,businessname,phonenumber,password) VALUES('$fname','$bizname','$phone','$hashed_password')";

        mysqli_query($conn, $query);

		if ($query) {
			$msg = "<div class='alert alert-success'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; successfully registered!
					</div>";
					header("Location: invitedagent.php");
		} else {
			$msg = "<div class='alert alert-danger'>
						<span class='glyphicon glyphicon-info-sign'></span> &nbsp; error while registering!
					</div>";
		}
		
}
?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>OyaPay Agent</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="style.css" type="text/css">

</head>
<body style="background-color:#ccc;">
<center><header style="margin-top:30px;">
<img src="" style="border-radius:5%;width:12%;height:12%">
</header></center>
<div class="signin-form">
   <center><h1 style="color:#fff;">OyaPay Agent</h1></center>
	<div class="container">
     
        
       <form class="form-signin" method="post" id="register-form">
      
        <h2 class="form-signin-heading">Agent Account</h2><hr/>
        
        <?php
		if (isset($msg)) {
			echo $msg;
		}
		?>
          
        <div class="form-group">
        <input type="text" class="form-control" placeholder="Full Name" name="fullname" required/>
        </div>
		
		<div class="form-group">
        <input type="text" class="form-control" placeholder="Business Name" name="businessname" required/>
        </div>

        <div class="form-group">
        <input type="text" class="form-control" placeholder="Phone Number" name="phonenumber" required/>
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password" required/>
        </div>
		
     	<hr />
        
        <div class="form-group">
            <button type="submit" class="btn btn-default" name="btn-signup">
    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account
			</button> 
            <a href="#" class="btn btn-default" style="float:right;">Already registered? Log In Here</a>
        </div> 
      
      </form>

    </div>
    <center><footer style="color:#000; margin-top:30px;">Created by King Nicholas</footer></center>
</div>



<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src=></script>
<script src="oyapaymerchant/js/bootstrap.min.js"></script>

<script>
  $( function() {
    $( ".selectpicker" ).selectpicker();
  } );
  </script> 

</body>
</html>