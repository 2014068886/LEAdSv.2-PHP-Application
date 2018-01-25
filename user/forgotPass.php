<?php 
	require_once 'config.php';
	
	if(isset($_POST) && !empty($_POST)){
		$username = mysqli_real_escape_string($link, $_POST['username']);
		$sql = "SELECT * from users where username='$username'";
		$result = mysqli_query($link, $sql);
		$count = mysqli_num_rows($result);
		if($count == 1){
			echo "Email Sent";
		} else {
			echo "Username does not exist";
		}
		
	$row = mysqli_fetch_assoc($result);
	$password = $row['password'];
	$toEmail = $row['email'];
	$subject = "Your Recovered Password";
	
	$message = "Please use this password to login " . $password;
	$headers =  'MIME-Version: 1.0' . "\r\n";
	$headers .= 'From: jm_bayocot@yahoo.com' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	
	if(mail($toEmail, $subject, $message, $headers)){
		echo "Your Password has been sent to your email id";
	} else {
		echo "Failed to Recover your password, try again";
	}

	}
?>
<!DOCTYPE HTML">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Insert title here</title>
</head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   	<style>
   		.form-signin {
   			max-width:330px;
   			padding: 15px;
   			margin: 0 auto;
   		}
   	</style>
    <body>
    	<form class="form-signin" method="POST">
    		<h2> Forgot Password </h2>
    		<div class="input-group">
    			<input type="text" name="username" class="form-control" placeholder="Username" required> 
    		</div>
    		<button class="btn btn-lg btn-primary btn-block" type="submit"> Submit </button>
    	</form>
    </body>
</html>