<?php
session_start();

if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype'])=='User')
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
   
	<link href="min/plugin-min.css" type="text/css" rel="stylesheet">
    <link href="min/custom-min.css" type="text/css" rel="stylesheet" >
  
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

	<link rel="stylesheet" href="css/preloader.css" type="text/css"/>
	<script src="js/preloader.js"></script>
	
</head>
<body id="top">
  <script>
	 $(document).ready(function(e){
		$(".dropdown-button").dropdown();
	 });
  </script>
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

<!--Hero-->
<div class="section no-pad-bot" id="index-banner" >
    <div class="container">
        <h1 class="text_h center header cd-headline letters type">
            <span>LEAdS</span> <br>
            <span class="cd-words-wrapper waiting">
                <b class="is-visible">LANDSLIDE PA. Wth. SABOG af</b>
                <b>Keep it Up</b>
                <b>Thesis MORE HAHA</b>
            </span>
        </h1>
    </div>
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
            	
            	<div class="col s12 m4 l4">
            		<div class="center promo promo-example">
            			<i class="mdi-image-landscape"></i>
            			<h5 class="promo-caption">Be Prepared</h5>
            			<p class="light center"> In case a Landslide might occur </p>
            		</div>
            	</div>
            			
            </div>
         </div>
</div>


<div class="container">
      <h2 class="header text_b">Device Status</h2>
      
      <!--  <h4><center>Welcome, <?php echo $_SESSION['mysesi'] ?></center></h4>  -->
      
      <div align="center" > 
      <br>
		<font size=2 >Battery <a id="bat"></a>%</font> 
		<table class="centered highlight">
		  <tbody>
			<tr>
				<td width="180px">Location</td> 
				<td width="210px"><a id="loc"> </a> </td>
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
		<a href="http://jessica:jess1234@192.168.1.108/">IP CAMERA</a> </div> 
		
		<?php 
			include 'config.php';
			
			
		
		?>
</div>
<div class="parallax-container">
    <div class="parallax"><img src="LEAdSBackgroundv2.png"></div>
</div>
<footer id="contact" class="page-footer default_color">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
               	<h5 class="white-text">Chat with us!</h5>
                <p class="grey-text text-lighten-4">Your feedbacks are always welcome and we are always trying to find new ways to improve our services.</p>
                 <form method="post" class="col s12" action="contact.php">
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="mdi-communication-email prefix white-text"></i>
                            <input id="icon_email" name="email" type="email" class="validate white-text" required="required">
                            <label for="icon_email" class="white-text">Email Address</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="mdi-editor-mode-edit prefix white-text"></i>
                            <textarea id="icon_prefix2" name="message" class="materialize-textarea white-text" required="required"></textarea>
                            <label for="icon_prefix2" class="white-text">Message</label>
                        </div>
                        <div class="col offset-s7 s5">
                            <button class="btn waves-effect waves-light red darken-1" name="exportDB" type="submit"> SUBMIT
                                <i class="mdi-content-send right white-text"></i>
                           </button>
                        </div>
                    </div>
                </form>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">LEAdS</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            &copy; 2018 Copyright Text
            <!--  <a class="grey-text text-lighten-4 right" href="#!">More Links</a> -->
            </div>
          </div>
        </footer>
</body>

<script type="text/javascript" src="js/materialize.min.js"></script>
<script src="min/plugin-min.js"></script>
<script src="min/custom-min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>  
