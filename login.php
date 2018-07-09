<?php
session_start();

if (isset($_SESSION['userSession'])!="") {
	header("Location: dashboard.php");
	exit();
}

if (isset($_POST['btn-login'])) {
	
	require_once 'dbconnect.php';
	
	// Get form data
	$fname = mysqli_real_escape_string($conn, $_POST['fullname']);
	$pass = mysqli_real_escape_string($conn, $_POST['password']);

	//select stmt
	$query = "SELECT fullname, password FROM merchant WHERE fullname='$fname'";
	$result = mysqli_query($conn, $query);
	
	while($resultCount = mysqli_fetch_array($result)){
	
	if (password_verify($pass, $resultCount['password']) && $resultCount > 0) {
		$_SESSION['userSession'] = $resultCount['fullname'];
		header("Location: dashboard.php");
	}
  } 
	
	mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>OyaPay Merchant</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body style="background-color:#ccc;">
<center>
<header style="margin-top:30px;">
<img src="" style="border-radius:5%;width:12%;height:12%">
</header>
</center>
<div class="signin-form">
<center><h1 style="color:#fff;">OyaPay Merchant</h1></center>
	<div class="container">
     
        
       <form class="form-signin" method="post" id="login-form">
      
        <h2 class="form-signin-heading">Sign In</h2><hr />
        
        <?php
		if(isset($msg)){
			echo $msg;
		}
		?>
        
        <div class="form-group">
        <input type="text" class="form-control" placeholder="Fullname" name="fullname" required/>
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" placeholder="Password" name="password" required />
        </div>
       
     	<hr />
        
        <div class="form-group">
            <button type="submit" class="btn btn-default" name="btn-login" id="btn-login">
    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
			</button> 
            
            <a href="register.php" class="btn btn-default" style="float:right;">Sign up here</a>
            
        </div>  
      
      </form>

    </div>
    <center><footer style="color:#000; margin-top:30px;">Created by King Nicholas</footer></center>
</div>

</body>
</html>