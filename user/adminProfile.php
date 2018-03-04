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
<title>Profile</title>
</head>
    <body>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <nav class="navbar navbar-inverse">
  		<div class="container-fluid">
    		<div class="navbar-header">
      			<a class="navbar-brand" href="#"> LEAdS v.2</a>
    		</div>
    		<ul class="nav navbar-nav">
      			<li> <a href="admin.php">Home</a></li>
      			<li> <a href="logs.php"> Logs </a> </li>
      			<li class="active"><a href="profile.php">Profile</a></li>
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
    
    <?php 
    	include 'config.php';
    	
    	$result = $link->query("SELECT * FROM users where username='".$username."'");
    	$row = $result->fetch_assoc();
    	$firstName = $row['firstName'];
    	$lastName = $row['lastName'];
    	$user = $row['username'];
    	$email = $row['email'];
    	$mobileNum = $row['mobileNum'];
        
    	echo 
    	"<div class = 'col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad'>
        <div class = 'panel panel-info'>
            <div class = 'panel-heading'>
                <h3 class = 'panel-title' align = 'center'> <font face = 'century' color='black'> MY PROFILE </font> </h3>
            </div>
            <div class = 'panel-body'>
    		<div class='row'>
    		<div class = 'col-md-12 col-lg-12'>
    			<table class = 'table table-user-information'>
    				<tr>
    				<th> <span class = 'glyphicon glyphicon-user'> </span> Username </th>
    				<td>" .$user. " </td>
    				</tr>
    				<tr>
    				<th> <span class = 'glyphicon glyphicon-pencil'> </span> Name </th>	
    				<td>" .$firstName."&nbsp;". $lastName ." </td>
    				</tr>
    				<tr>
    				<th> <span class = 'glyphicon glyphicon-envelope'> </span> Email Address </th>
    				<td>" .$email. " </td>
    				</tr>
    				<tr>
    				<th> <span class = 'glyphicon glyphicon-phone'> </span> Mobile Number </th>
    				<td>" .$mobileNum. " </td>
    				</tr>
    		</table>
    	</div>
    	</div>
    	</div>
        <div class='panel-footer'>
             <button type='button' class='btn btn-primary dropdown-toggle' data-toggle='modal' data-target='#edit'> <span class='glyphicon glyphicon-edit'></span> Edit Profile </button>
        </div>
    </div>";
?>
    <div class='modal fade' id='edit' role='dialog'>
            <div class='modal-dialog modal-sm'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <button type='button' class='close' data-dismiss='modal'>&times;</button>
                        <h4 class='modal-title'> Edit Password </h4>
                    </div>
                    <div class='modal-body'>
                        <div class='panel-body'>
                            <form method = "POST" action = "adminEditProfile.php">
                            	<input type="hidden" name="username" value="<?php $username ?>" />
    							<label> Email Address </label> 
    							<input type="email" name="email" id="email" class="form-control"><br>
    							<label> Mobile Number </label>
    							<input type="text" name="mobileNum" id="mobileNum" class="form-control"><br><br>
    			
    							<center><input type="submit" class="btn btn-primary"> <input type="reset" class="btn btn-primary"> </center>	
                            </form>		
                        </div>
                    </div>
                </div>
            </div>
        </div>
   
    </body>
</html>