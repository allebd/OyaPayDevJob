<?php
session_start();

if (!isset($_SESSION['userSession'])) {
	header("Location: dashboard.php");
}

if(isset($_POST['add-user'])) {

  include_once 'dbconnect.php';

  // Get form data
  $name = mysqli_real_escape_string($conn, $_POST['agentname']);
  $phone = mysqli_real_escape_string($conn, $_POST['phonenumber']);

$query = "INSERT INTO add_agent(name,phonenumber) VALUES('$name','$phone')";

    mysqli_query($conn, $query);

    if ($query) {
      echo "<script>alert('Agent was added successfully');</script>";
          
    } else {
      echo "<script>alert('Please try adding again');</script>";
    }
    
}

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Welcome, Admin ...</title>

<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"> 
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<link rel="stylesheet" href="style.css" type="text/css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="js/modalform.js"></script>
</head>

<body style="background-color:transparent;">

<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Merchant Dashboard</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          
		  <ul type="none" style="float:right;margin-left:30px; margin-top: 15px"> 
		   <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</a></li>		  </ul>
          <ul type="none" style="float:right; margin-top: 15px">
            <li><a href="#"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Edit Profile</a></li>
          </ul>
		  <ul type="none" style="float:right; margin-top:5px; margin-right:15px;">
            <li><button class="btn btn-default" id="button">Add Agent</button></li>
          </ul>        </div><!--/.nav-collapse -->
      </div>
    </nav>
	<br><br><br><br><br><br><br><br>

<div id="container" style="background:#FFF">
	<h2>Payments and Transaction Records<br> ...................<br>...................<br>...................<br>
    ...................<br>...................</h2>
</div>

     <!--Modal Form section -->
     <div class="bg-modal">
        <div class="modal-content">
          <div class="close">+</div>
          <img src="img/user.png" alt="user-icon">
          
          <form action="" method="post">
            <input type="text" name="agentname" placeholder="Name" required="required">
            <input type="text" name="phonenumber" placeholder="Phone Number" required="required">
            <button type="submit" class="btn btn-default" name="add-user" id="btn-add">Add Agent</button>
          </form>
        </div>
     </div>


    <!--Modal Form JS Function -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="js/modalform.js"></script>

</body>
</html>