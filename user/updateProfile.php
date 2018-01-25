<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Insert title here</title>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <body>   
    <nav class="navbar navbar-inverse">
  		<div class="container-fluid">
    		<div class="navbar-header">
      			<a class="navbar-brand" href="#"> LEAdS v.2</a>
    		</div>
    		<ul class="nav navbar-nav">
      			<li> <a href="index.php">Home</a></li>
      			<li class="active"><a href="profile.php">Profile</a></li>
      			<li class="dropdown"> <a class = "dropdown-toggle" data-toggle = "dropdown" href="#"> Settings <span class = "caret"> </span> </a> 
      	 			<ul class="dropdown-menu">
      	 				<li> <a href="changePassword.php"> Change Password </a> </li>
      	       	    </ul>
      			</li>
    		</ul>
    		<ul class="nav navbar-nav navbar-right">
      			<li> <a href="logout.php"><span class="glyphicon glyphicon-log-out"> </span> Sign Out</a> </li>
    		</ul>
  		</div>
	</nav>
                            <form  action = "editProfile.php" method = "PI">
                                <label> Username </label>
    							<input type='text' name="username"><br>
    							<label> First Name </label>
    							<input type='text' name="fname"> <br>
    							<label> Last Name </label>
    							<input type='text' name="lname"> <br>
    							<label> Email Address </label> 
    							<input type='email' name="email"><br>
    							<label> Mobile Number </label>
    							<input type='number' name="mobileNum" id="mobileNum" class="form-control"><br><br>
    			
    							<center><button type='submit' class='btn btn-primary'> Submit </button> <button type='reset' class='btn btn-primary'> Reset </button> </center>	
                            </form>		
   </body>
</html>