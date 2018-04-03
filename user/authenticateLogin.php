<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Login</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">  
</head>
    <body>
    <?php
    $message="";
    if(count($_POST)>0) {
    	$conn = mysqli_connect("127.0.0.1", "root", "12345", "leads");
    	$result = mysqli_query($conn,"SELECT * FROM users where username='".$_POST['username']."' and password='".$_POST['password']."'");
    	$count  = mysqli_num_rows($result);
    	$row = $result->fetch_assoc();
    	$name = $row['firstName'];
    	$user = $row['username'];
    	$pass = $row['password'];
    	$type = $row['user_type'];
    	if($count==0) {
    		$message = "Invalid Username or Password!";	
    	} else {
    		if($type=="Admin"){
    			$_SESSION['mysesi']=$user;
    			$_SESSION['mytype']=$type;
    			echo "<script>window.location.assign('admin.php')</script>";
    		} else if($type=="User"){
    			$_SESSION['mysesi']=$user;
    			$_SESSION['mytype']=$type;
    			echo "<script>window.location.assign('index.php')</script>";
    		} else{
    ?>			<div class="alert alert-warning alert-dismissible" role="alert">
  					<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
  					<strong>No User Type Found!</strong>
				</div>
	<?php
    		}
    	}
    }
	?>
    </body>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
    <!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>