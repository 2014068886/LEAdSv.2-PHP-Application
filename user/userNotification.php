<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Notification</title>

<link href="min/plugin-min.css" type="text/css" rel="stylesheet">
<link href="min/custom-min.css" type="text/css" rel="stylesheet" >

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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
<div id="loader-wrapper">
    <div id="loader"></div>
 
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
 
</div>

<ul id="dropdown1" class="dropdown-content">
  <li><a href="changePassword.php">Change Password</a></li>
    <li class="divider"></li>
  <li><a href="faq.php">FAQ</a></li>
</ul>
<div class="navbar-fixed">
    <nav id="nav_f" class="default_color" role="navigation">
        <div class="container">
            <div class="nav-wrapper">
            <a href="index.php" id="logo-container" class="brand-logo"><img src="img/logo_white.png" style="width:140px" /> </a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li class="active"><a href="userNotification.php">Notification</a></li>
                    <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Settings<i class="material-icons right">arrow_drop_down</i></a></li>
                    <li><a href="logout.php"> Sign Out</a> </li>
                </ul>
                <ul id="nav-mobile" class="side-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li class="active"><a href="userNotification.php">Notification</a></li>
                    <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Settings<i class="material-icons right">arrow_drop_down</i></a></li>
                    <li><a href="logout.php"> Sign Out</a> </li>
                </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
            </div>
        </div>
    </nav>
</div>  
<div class="container">
  <?php 
  include 'config.php';
  
  $triggerNotif = $link->query("SELECT * FROM logs WHERE date IN (SELECT MAX(date) FROM logs WHERE 
  		level='2' OR level='3') ORDER BY date DESC");
  $ro = $triggerNotif->fetch_assoc();

  	$res = $ro['level'];
  	if($res=='2'){
  		echo "<center> <h2> Get ready for an evacuation and wait for further announcements! </h2> </center>";
  	} else if ($res=='3'){
  		echo "<center> <h2> Immediate evacuation is required! </h2> </center>";
  	} else {
  
  	}
  ?>
</div>
</body>
</html>