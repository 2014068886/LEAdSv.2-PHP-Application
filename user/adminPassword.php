<?php
session_start();

if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype'])=='User')
{
	echo "<script>window.location.assign('login.php')</script>";
}

$username = $_SESSION['mysesi'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Profile</title>
</head>
    <body>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <nav class="navbar navbar-inverse">
  		<div class="container-fluid">
    		<div class="navbar-header">
      			<a class="navbar-brand" href="#"> LEAdS v.2</a>
    		</div>
    		<ul class="nav navbar-nav">
      			<li> <a href="admin.php">Home</a></li>
      			<li> <a href="#"> Logs </a> </li>
      			<li> <a href="adminProfile.php">Profile</a></li>
      			<li class="dropdown"> <a class = "dropdown-toggle" data-toggle = "dropdown" href="#"> <b> Settings </b> <span class = "caret"> </span> </a> 
      	 			<ul class="dropdown-menu">
      	 				<li> <a href="adminPassword.php"> Change Password </a> </li>
      	       	    </ul>
      			</li>
    		</ul>
    		<ul class="nav navbar-nav navbar-right">
      			<li> <a href="logout.php"><span class="glyphicon glyphicon-log-out"> </span> Sign Out</a> </li>
    		</ul>
  		</div>
	</nav>
</body>
</html>