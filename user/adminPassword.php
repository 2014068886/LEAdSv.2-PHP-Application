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

    <link href="min/plugin-min.css" type="text/css" rel="stylesheet">
    <link href="min/custom-min.css" type="text/css" rel="stylesheet" >
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
  <script>
	 $(document).ready(function(e){
		$(".dropdown-button").dropdown();
	 });
  </script>

</head>
<body>
   
<div class="navbar-fixed">
<ul id="dropdown1" class="dropdown-content">
  <li><a href="adminPassword.php">Change Password</a></li>
    <li class="divider"></li>
  <li><a href="adminFAQ.php">FAQ</a></li>
</ul>
    <nav id="nav_f" class="default_color" role="navigation">
        <div class="container">
            <div class="nav-wrapper">
            <a href="admin.php" id="logo-container" class="brand-logo"><img src="img/logo_white.png" style="width:140px" /> </a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="admin.php">Home</a></li>
                    <li><a href="logs.php"> Logs</a></li>
                    <li><a href="adminProfile.php">Profile</a></li>
                    <li><a href="notification.php">Notification</a></li>
                    <li class="active"><a class="dropdown-button" href="#!" data-activates="dropdown1">Settings<i class="material-icons right">arrow_drop_down</i></a></li>
                    <li><a href="logout.php"> Sign Out</a> </li>
                </ul>
                <ul id="nav-mobile" class="side-nav">
                    <li><a href="#intro">About</a></li>
                    <li><a href="#order">Order</a></li>
                    <li><a href="#team">Team</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
            </div>
        </div>
    </nav>
</div> 
<div class="container">
	  <h3 class="header text_b" style="text-align:middle;">Change Password!</h3>
        <div class="row">
            <div class="col s12">
                <div class="card">
                   <div class="card-content">
						<form method="POST" action="adminChangePassword.php" class="col s10" >
						<div class="row">
							<div class="input-field col s7">
					 			<input type="text" name="username" id="username" class="validate" required="required">
          			 			<label for="username">Username</label>
							</div>
							<div class="input-field col s7">
					 			<input type="password" name="oldPwd" id="oldPwd" class="validate"/> 
					 			<label for="oldPwd">New Password</label>
							</div>
							<div class="input-field col s7">
					 			<input type="password" name="confPwd" id="confPwd" class="validate"/> 
					 			<label for="confPwd">Confirm Password</label>
							</div>
							<div class="input-field col s7">
								<button class="btn waves-effect waves-light" type="submit" >Submit</button>
					  			<button class="btn waves-effect waves-light" type="reset" >Reset</button>	
							</div>
				
						</div>	
						</form>
	  				</div>
				</div>
			</div>
		</div>
</div>
</body>
  <script type="text/javascript" src="js/materialize.min.js"></script>
</html>