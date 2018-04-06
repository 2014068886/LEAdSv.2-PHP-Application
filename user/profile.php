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
  
</head>
<body>

<script>
  	$document.ready(function(e){
		$(".dropdown-button").dropdown();
	 });
  </script>
<div class="navbar-fixed">
    <ul id="dropdown1" class="dropdown-content">
  		<li><a href="changePassword.php">Change Password</a></li>
    	<li class="divider"></li>
   		<li><a href="faq.php">FAQ</a></li>
	</ul>
    <nav id="nav_f" class="default_color" role="navigation">
        <div class="container">
            <div class="nav-wrapper">
            <a href="index.php" id="logo-container" class="brand-logo"><img src="img/logo_white.png" style="width:140px" /> </a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="index.php">Home</a></li>
                    <li class="active"><a href="profile.php">Profile</a></li>
                    <li><a href="userNotification.php">Notification</a></li>
                    <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Settings<i class="material-icons right">arrow_drop_down</i></a></li>
                    <li><a href="logout.php"> Sign Out</a> </li>
                </ul>
                <ul id="nav-mobile" class="side-nav">
                    <li><a href="index.php">Home</a></li>
                    <li class="active"><a href="profile.php">Profile</a></li>
                    <li><a href="userNotification.php">Notification</a></li>
                    <li><a href="logout.php"> Sign Out</a> </li>
                </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
            </div>
        </div>
    </nav>
</div>  
<div id="profile-page-header" class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="img/user-profile-bg.jpg" alt="user background" style="height: 250px">                    
                </div>
                <figure class="card-profile-image">
                    <img src="img/user.jpg" style="width: 100px" alt="profile image" class="circle z-depth-2 responsive-img activator">
                </figure>
                <div class="card-content">
                  <div class="row">         
                  <?php 
    					include 'config.php';
    	
    					$con = new dbCon();
    					$user = $username;
    					$res = $con->selectProfile($user);
    	 
    					while($row=$res->fetch_assoc()){
    				?>           
                    <div class="col s3 offset-s2">                        
                        <h4 class="card-title grey-text text-darken-4"><?php echo $row['firstName'] . "&nbsp;" . $row['lastName']; ?></h4>
                        <p class="medium-small grey-text">User</p>                        
                    </div>
                    <div class="col s2 center-align">
                        <h4 class="card-title grey-text text-darken-4"><?php echo $row['username']; ?></h4>
                        <p class="medium-small grey-text">Username</p>                        
                    </div>
                    <div class="col s2 center-align">
                        <h4 class="card-title grey-text text-darken-4">Lorem Ipsum</h4>
                        <p class="medium-small grey-text">Email</p>                          
                    </div>                    
                    <div class="col s2 center-align">
                        <h4 class="card-title grey-text text-darken-4">Lorem ipsum</h4>
                        <p class="medium-small grey-text">Email</p>                  
                    </div>                    
                    <div class="col s1 right-align">
                      <a class="btn-floating activator waves-effect waves-light darken-2 right">
                          <i class="mdi-action-perm-identity"></i>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="card-reveal">
                    <p>
                      <span class="card-title grey-text text-darken-4"><?php echo $row['firstName'] ."&nbsp;". $row['lastName']; ?> <i class="mdi-navigation-close right"></i></span>
                      <span><i class="mdi-action-perm-identity cyan-text text-darken-2"></i> User </span>
                    </p>

                    <p>I am a student of UST-IICS and i'm very interested to use this app</p>
                    
                    <p><i class="mdi-action-perm-phone-msg cyan-text text-darken-2"></i> +63 <?php $row['mobileNum']?></p>
                    <p><i class="mdi-communication-email cyan-text text-darken-2"></i><?php echo $row['email']; ?></p>
                    <p><i class="mdi-social-cake cyan-text text-darken-2"></i> Birthday </p>
                    <p><i class="mdi-device-airplanemode-on cyan-text text-darken-2"></i> MNL, PH </p>
                    <a href='updateProfile.php' class='btn btn-primary dropdown-toggle'> <span class='glyphicon glyphicon-edit'></span> Edit Profile </a>           
                    
                </div>
            </div>
    		<?php 
    					} 
    		?>
</div>
</body>
<script type="text/javascript" src="js/materialize.min.js"></script>
</html>