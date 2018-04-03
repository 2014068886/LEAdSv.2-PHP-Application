<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Notification </title>

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
                    <li class="active"><a href="notification.php">Notification</a></li>
                    <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Settings<i class="material-icons right">arrow_drop_down</i></a></li>
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
<br/>

<div class="container">
<?php 
  include 'config.php';
  
  $triggerNotif = $link->query("SELECT * FROM logs WHERE date IN (SELECT MAX(date) FROM logs WHERE 
  		level='2' OR level='3') ORDER BY date DESC");
  $ro = $triggerNotif->fetch_assoc();

  	$res = $ro['level'];
  	if($res=='2'){
  		echo "<center> <h2> Get ready for an evacuation and wait for further announcements! </h2> </center>";
  		$auditNotif = $link->query("INSERT INTO notifications (description, level, date) values ('Medium',2,CURRENT_TIMESTAMP())");
  		$output = shell_exec('echo "TEXT MESSAGE" | gammu-smsd-inject TEXT <09987903914> -len 400');
  		
  	} else if ($res=='3'){
  		echo "<center> <h2> Immediate evacuation is required! </h2> </center>";
  		$auditNotif = $link->query("INSERT INTO notifications (description, level, date) values ('High',3,CURRENT_TIMESTAMP())");
  		$output = shell_exec('echo "TEXT MESSAGE" | gammu-smsd-inject TEXT <09987903914> -len 400');
  		
  	} else {
  
  	}
?>
<br/><br/>
<div>
	<center><a href="auditLogs.php" class="btn btn-success"> View Notification Logs </a> </center>
</div>

</div>
</body>
      <script type="text/javascript" src="js/materialize.min.js"></script>
</html>