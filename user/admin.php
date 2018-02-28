<?php
session_start();

if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype'])=='Admin')
{
  echo "<script>window.location.assign('login.php')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Session</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
  </head>
  <body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"> LEAdS v.2</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li> <a href="logs.php"> Logs </a> </li>
      <li> <a href="adminProfile.php">Profile</a></li>
      <li> <a href="notification.php">Notification</a></li>
      <li class="dropdown"> <a class = "dropdown-toggle" data-toggle = "dropdown" href="#"> Settings <span class = "caret"> </span> </a> 
      	 <ul class="dropdown-menu">
      	 	<li> <a href="adminPassword.php"> Change Password </a> </li>
      	 	<li> <a href="adminFAQ.php">FAQ</a></li>
      	 </ul>
      </li>
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li> <a href="logout.php"><span class="glyphicon glyphicon-log-out"> </span> Sign Out</a> </li>
    </ul>
  </div>
</nav>
  <div class="container">
   
    <div class="jumbotron">
      <h2><center>Welcome, <?php echo $_SESSION['mysesi'] ?></center></h2>
      
      <div align="center" > 
      <br>
		<font size=2 >Battery <a id="bat"></a>%</font> 
		<table border="1">
			<td width="180px">Location</td> 
			<td width="210px"><a id="loc"> </td>
			<tr> 
				<td width="80px">Movement</td> 
				<td id="gg2" width="40px"><a id="deg"> </a> </td>
			</tr> 
			<tr> 
				<td width="80px">Moisture</td> 
				<td width="40px"><a id="mois"> </a> %</td> 
			</tr> 
			<tr> 
				<td width="80px">Rain</td> 
				<td width="40px"><a id="rain"> </a> mL</td> 
			</tr> <p> </p> <p> </p> 
			<td width="80px">Alert Level</td> 
			<td width="40px"><a id="level"> </a> </td> 
			<tr> 
			</tr>
		</table> <p>&nbsp;</p> <p>&nbsp;</p> 
		<a href="http://admin:admin@192.168.2.10/">IP CAMERA</a> </div> </div >
		<iframe id="f1" frameborder="0" src=""><iframe> <iframe id="f2" src=""><iframe>
    </div>  
    </div>
     
  </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>  
