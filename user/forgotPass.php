<!DOCTYPE HTML">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Forgot Password</title>
</head>
	<link href="demo-style.css" rel="stylesheet" type="text/css">
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
    	<form name="frmForgot" id="frmForgot" method="post" action="processForgotPass.php">
    		<h2> Forgot Password </h2> <br/>
    		<?php if(!empty($success_message)) { ?>
				<div class="success_message"><?php echo $success_message; ?></div>
			<?php } ?>

			<div id="validation-message">
				<?php if(!empty($error_message)) { ?>
				<?php echo $error_message; ?>
				<?php } ?>
			</div>
			
    		<div class="field-group">
    			<div> <label for="username"> Username </label> </div>
    			<div> <input type="text" name="username" id="username" class="input-field" placeholder="Enter Username Here" required> </div>
    		</div> 
    		<div class="field-group">
				<div><label for="email">Email</label></div>
				<div><input type="text" name="email" id="email" class="input-field" placeholder="Enter Email Address Here" required></div>
			</div>
    		<div class="field-group">
				<div><input type="submit" name="forgot-password" id="forgot-password" value="Submit" class="form-submit-button"></div>
			</div>	
    	</form>
    	<?php
if(isset($_SESSION['msg']))
{
echo $_SESSION['msg'];
unset($_SESSION['msg']);
}
?>
    	
    </body>
</html>