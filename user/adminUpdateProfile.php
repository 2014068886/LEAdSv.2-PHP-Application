<?php
session_start();

if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype'])=='Admin')
{
  echo "<script>window.location.assign('login.php')</script>";
}

$username = $_SESSION['mysesi'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Admin Edit Profile</title>
    <link href="min/plugin-min.css" type="text/css" rel="stylesheet">
    <link href="min/custom-min.css" type="text/css" rel="stylesheet" >
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen, projection">
   
    <link href="css/style-horizontal.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="css/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">
    
      
  <script>
	 $(document).ready(function(e){
		$(".dropdown-button").dropdown();
	 });
  </script>
</head>
<body>
<header class="top-nav">

<ul id="dropdown1" class="dropdown-content">
  <li><a href="adminPassword.php">Change Password</a></li>
    <li class="divider"></li>
  <li><a href="adminFAQ.php">FAQ</a></li>
</ul>
<div class="navbar-fixed">
    <nav id="nav_f" class="default_color">
            <div class="nav-wrapper container">
            <a href="admin.php" id="logo-container" class="brand-logo"><img src="img/logo_white.png" style="width:140px" /> </a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="admin.php">Home</a></li>
                    <li><a href="logs.php"> Logs</a></li>
                    <li class="active"><a href="adminProfile.php">Profile</a></li>
                    <li><a href="notification.php">Notification</a></li>
                    <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Settings<i class="material-icons right">arrow_drop_down</i></a></li>
                    <li><a href="logout.php"> Sign Out</a> </li>
                </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
            </div>
    </nav>
</div> 
</header>        
<div class="container" style="width:400px;">
   <div class="form">
	<div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
      <form id="form" class="login-form" method="post" action="processUpdate.php" novalidate="novalidate">
        <div class="row">
          <div class="input-field col s12 center">
            <h4>Edit Profile</h4>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="username" type="text" name="username" aria-required="true">
            <label for="username" class="center-align">Username</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-communication-email prefix"></i>
            <input id="email" type="email" name="emailAdd" aria-required="true">
            <label for="email" class="center-align">Email</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="material-icons prefix">smartphone</i>
            <input id="mobileNum" type="text" name="mobileNum" aria-required="true">
            <label for="mobileNum">Mobile Number</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <button type="submit" class="btn waves-effect waves-light col s12" name="action">Update Now</button>
          </div>
          <div class="input-field col s12">
            <p class="margin center medium-small sign-up"><a href="adminProfile.php">Go Back</a></p>
          </div>
        </div>
      </form>
    </div>
  </div>
  </div>
</div>
</body>
<script>
	  $.validator.setDefaults({
	  errorClass: 'invalid',
	  validClass: "valid",
	  errorPlacement: function(error, element) {
	    $(element)
	      .closest("form")
	      .find("label[for='" + element.attr("id") + "']")
	      .attr('data-error', error.text());
	  },
	  submitHandler: function(form) {
	    console.log('form ok');
	  }

	  $("#form").validate({
		  rules: {
		    dateField: {
		      date: true
		    }
		  }
		});
			  
</script>
<script type="text/javascript" src="js/materialize.min.js"></script>
 <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
</html>