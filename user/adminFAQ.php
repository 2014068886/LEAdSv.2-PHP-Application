<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title> Admin FAQ </title>
    <link href="min/plugin-min.css" type="text/css" rel="stylesheet">
    <link href="min/custom-min.css" type="text/css" rel="stylesheet" >
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

<div class = "container">
 		<center> <h2> Frequently Asked Questions </h2> </center>
    	<h4> What is Landslide? </h4> 
    	<p> A landslide is the movement of rock, earth, or debris down a sloped section of land. Landslides are caused by rain, earthquakes, volcanoes, or other factors that make the slope unstable. </p> <br>
    
    	<h4> What to do before a landslide? </h4>
    	<ul> 
    		<li> Get a ground assessment of your property. </li>
    		<li> Learn about the emergency-response and evacuation plans for your area. Develop your own emergency plan for your family or business. </li>
    		<li> Watch the patterns of storm-water drainage near your home, and note the places where runoff water converges, increasing flow in channels. These are areas to avoid during a storm. </li>
    		<li> Contact local officials, state geological surveys or departments of natural resources, and university departments of geology. Landslides occur where they have before, and in identifiable hazard locations </li>
    		<li> Do not build near steep slopes, close to mountain edges, near drainage ways, or natural erosion valleys. </li>
    	</ul> <br>
    
    
    	<h4> What to do during a landslide? </h4>
    	<ul> 
    		<li> Listen to local news stations on a battery-powered radio for warnings of heavy rainfall. </li>
    		<li> Listen for unusual sounds that might indicate moving debris, such as trees cracking or boulders knocking together. </li>
    		<li> If you are near a stream or channel, be alert for any sudden increase or decrease in water flow and for a change from clear to muddy water. Such changes may indicate landslide activity upstream, so be prepared to move quickly. Don't delay! Save yourself, not your belongings. </li>
    		
    	</ul> <br>
    
    	<h4> What happens when you hear the alarm? </h4> 
    	<p> Don't panic. Immediately inform the person in charge in your community or the disaster response team for immediate evacuation </p> <br>
    	
    	<h4> What does Level 1, 2, 3 means? </h4> 
    	<ul>
    		<li> Level 1 - Wait for any further announcements! </li>
    		<li> Level 2 - Get ready for an evacuation and wait for further announcements! </li>
    		<li> Level 3 - Immediate evacuation is required! </li>
    	</ul> <br>
    	
  		<h4> Do i need to have an internet connection when accessing the app? </h4>
  		<p> No, but you need to have an internet to view the IP camera </p> <br>
  		
  		<h4> Is the mobile application available only to Android? </h4>
  		<p> Yes, be ready for updates soon! </p> <br>
</body>
<script src="https://www.gstatic.com/firebasejs/4.12.1/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIza5y8hEnZMKb3lpoj_CvYmnvInhPc1MN0PwGU",
    authDomain: "leadsmobileapp.firebaseapp.com",
    databaseURL: "https://leadsmobileapp.firebaseio.com",
    projectId: "leadsmobileapp",
    storageBucket: "leadsmobileapp.appspot.com",
    messagingSenderId: "685935317906"
  };
  firebase.initializeApp(config);
</script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
</html>