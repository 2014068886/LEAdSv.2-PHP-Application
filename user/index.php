<?php
session_start();

if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype'])=='User')
{
  echo "<script>window.location.assign('login.php')</script>";
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
  <title>Home Page</title>
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
<div class="preloader-background">
	<div class="preloader-wrapper big active">
		<div class="spinner-layer spinner-blue-only">
			<div class="circle-clipper left">
				<div class="circle"></div>
			</div>
			<div class="gap-patch">
				<div class="circle"></div>
			</div>
			<div class="circle-clipper right">
				<div class="circle"></div>
			</div>
		</div>
	</div>
</div>

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
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="userNotification.php">Notification</a></li>
                    <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Settings<i class="material-icons right">arrow_drop_down</i></a></li>
                    <li><a href="logout.php"> Sign Out</a> </li>
                </ul>
                <ul id="nav-mobile" class="side-nav">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="profile.php">Profile</a></li>
                    <li><a href="userNotification.php">Notification</a></li>
                    <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Settings<i class="material-icons right">arrow_drop_down</i></a></li>
                    <li><a href="logout.php"> Sign Out</a> </li>
                </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
            </div>
        </div>
    </nav>
</div>
<div class="parallax-container">
    		<div class="parallax"><img src="LEAdSBackgroundv2.png"></div>
</div>
<div class="container">
  
      <h4><center>Welcome, <?php echo $_SESSION['mysesi'] ?></center></h4>
      
      <div align="center" > 
      <br>
		<font size=2 >Battery <a id="bat"></a>%</font> 
		<table class="centered">
			<tbody>
			<tr>
				<td width="180px">Location</td> 
				<td width="210px"><a id="loc"> </td>
			</tr>
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
			<tr>
			<td width="80px">Alert Level</td> 
			<td width="40px"><a id="level"> </a> </td> 
			</tr>
		</tbody>
		</table> <p>&nbsp;</p> <p>&nbsp;</p> 
		<a href="http://admin:admin@192.168.2.10/">IP CAMERA</a> </div> </div>
</div>
<div id="intro" class="section scrollspy">
   		 <div class="container">
        	<div class="row">
            	<div class="col s12">
                	<h2 class="center header text_h2"> We cannot stop natural disasters but <span class="span_h2"> we can arm ourselves with knowledge: </span> so many lives wouldn't have to be lost if there was enough disaster preparedness - Petra Nemcova  </h2>
            	</div>
            	
            	<div class="col s12 m4 l4">
                	<div class="center promo promo-example">
                    	<i class="mdi-social-public"></i>
                    	<h5 class="promo-caption">Save the Earth</h5>
                    	<p class="light center">Environment-friendly operations</p> 
                	</div>
            	</div>
            	
            	<div class="col s12 m4 l4">
            		<div class="center promo promo-example">
            			<i class="mdi-alert-warning"></i>
            			<h5 class="promo-caption">Be Alert</h5>
            			<p class="light center"> Beware of your surroundings </p>
            		</div>
            	</div>
            </div>
         </div>
</div>

</body> 
  <script src="min/plugin-min.js"></script>
  <script src="min/custom-min.js"></script>
 <script type="text/javascript" src="js/materialize.min.js"></script>
</html>  