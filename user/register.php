<?php
include 'config.php';
 
$username = $password = $confirm_password = $firstName = $email = $lastName = $mobileNum = "";
$username_err = $firstName_err = $email_err = $mobile_num_err = $password_err = $confirm_password_err = "";
if(isset($_POST['add'])) {
    if(empty(trim($_POST['username']))){
        $username_err = "Please enter a username.";
    } else{
        $sql = "SELECT user_id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = trim($_POST["username"]);
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        mysqli_stmt_close($stmt);
    }
    
    if(empty(trim($_POST['firstName']))){
    	$firstName_err = "Please Enter a Name";
    } else {
    	$firstName = trim($_POST['firstName']);
    }
    
    if(empty(trim($_POST['lastName']))){
    	$firstName_err = "Please Enter a Name";
    } else {
    	$lastName = trim($_POST['lastName']);
    }

    if(empty(trim($_POST['password']))){
        $password_err = "Please Enter a Password";     
    } elseif(strlen(trim($_POST['password'])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST['password']);
    }

    if(empty(trim($_POST['confirm_password']))){
        $confirm_password_err = 'Please confirm password.';     
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = 'Password did not match.';
        }
    }
    
    if (empty($_POST['email'])) {
    	$email_err = "Email is required";
    } else {
    	$email = trim($_POST['email']);
    	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    		$email_err = "Invalid email format";
    	}
    }
    
    if(empty($_POST['mobileNum'])){
    	$mobile_num_err = "Mobile Num is required";
    } else {
    	$mobileNum = trim($_POST['mobileNum']);
    	if(!(preg_match('/^[0-9]{11}+$/', $mobileNum))){
    		$mobile_num_err = "Must be 11 digits";
    	}
    }
    
    $user_type = "User";
    $sql = "INSERT INTO users (username, password, firstName, lastName, mobileNum, user_type, email) VALUES ('".$username."','".$password."','".$firstName."','".$lastName."','".$mobileNum."','".$user_type."','".$email."')";
         
    if(mysqli_query($link, $sql)){
    	header("location: login.php");
    } else {
        echo "Please try again later.";
    }
    mysqli_close($link);
}
?>
<!DOCTYPE html>
<html>

	<head>
		<title>LEAdS</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
		<div class="container-fluid">
			<div class="row is-flex">
				<div class="col-sm-6 align-self-center text-center">
					<img src="LEAdS Logo_green.png" class="logo">
				</div>
				<div class="col-sm-6 align-self-center text-center">
					<div class="container-white">
						<h2>REGISTER ACCOUNT</h2><br>

						<div class="form-group">
						 <form action="<?php $_PHP_SELF ?>" method='post'>
  							<input type="text" class="form-control" id="name" style="margin-bottom: 5px;" placeholder="Last Name, First Name M.I.">
  							<input type="text" class="form-control" id="email" style="margin-bottom: 5px;" placeholder="E-mail">
  							<input type="text" class="form-control" id="mobilenum" style="margin-bottom: 5px;" placeholder="Mobile Number">
  							<input type="text" class="form-control" id="username" style="margin-bottom: 5px;" placeholder="Username">
						  	<input type="password" class="form-control" id="password1" style="margin-bottom: 5px;" placeholder="Password">
						  	<input type="password" class="form-control" id="password2" style="margin-bottom: 5px;" placeholder="Confirm Password"> <br>

							<input type="submit" class="btn btn-info" value="REGISTER"> <br><br>
						</form>
							<i><a href=""><< BACK</a></i>
						</div>


					</div>
				</div>
			</div>


		</div>

		<script src="bootstrap.js"></script>
		<script src="jquery-1.9.1.js" "></script>
	</body>

</html>