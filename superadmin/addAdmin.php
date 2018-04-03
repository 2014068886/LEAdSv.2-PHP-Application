<?php
include 'config.php';
 
$username = $password = $confirm_password = $firstName = $email = $lastName = "";
$username_err = $firstName_err = $email_err = $password_err = $confirm_password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
	//Validate Username
    if(empty(trim($_POST["username"]))){
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
    
    if( (empty(trim($_POST['firstName']))) && (empty(trim($POST['lastName']))) ){
    	$firstName_err = "Please Enter a Name";
    } else {
    	$firstName = trim($_POST['firstName']);
    	$lastName = trim($POST['lastName']);
    }
    
    // Validate password
    if(empty(trim($_POST['password']))){
        $password_err = "Please Enter a Password";     
    } elseif(strlen(trim($_POST['password'])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST['password']);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = 'Please confirm password.';     
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = 'Password did not match.';
        }
    }
    
    //Validate Email Address
    if (empty($_POST["email"])) {
    	$email_err = "Email is required";
    } else {
    	$email = trim($_POST["email"]);
    	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    		$email_err = "Invalid email format";
    	}
    }
    
   
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($firstName_err) && empty($email_err)){
        $sql = "INSERT INTO users (username, password, firstName, lastName, user_type, email) VALUES (?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ssssss", $param_username, $param_password, $param_firstName, $param_lastName, $param_user_type, $param_email);
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); 
            $param_firstName = $firstName;
            $param_lastName = $lastName;
            $param_user_type = "Admin";
            $param_email = $email;
            
            if(mysqli_stmt_execute($stmt)){
                header("location: superadmin.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    
    <link href="min/plugin-min.css" type="text/css" rel="stylesheet">
    <link href="min/custom-min.css" type="text/css" rel="stylesheet" >
    
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h4>Add Admin Account</h4>
                    </div>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                			<label>Username:<sup style="color: red">*</sup></label>
                			<input type="text" name="username"class="form-control" value="<?php echo $username; ?>">
                			<span class="help-block"><?php echo $username_err; ?></span>
            			</div>    
            			<div class="form-group <?php echo (!empty($firstName_err)) ? 'has-error' : ''; ?>">
            				<label>First Name: <sup style="color: red">*</sup> </label>
            				<input type="text" name="firstName" class="form-control" value="<?php echo $firstName; ?>">
   							<span class="help-block"><?php echo $firstName_err; ?></span>
            			</div>
            			<div class="form-group <?php echo (!empty($firstName_err)) ? 'has-error' : ''; ?>">
            				<label>Last Name: <sup style="color: red">*</sup> </label>
            				<input type="text" name="lastName" class="form-control" value="<?php echo $lastName; ?>">
   							<span class="help-block"><?php echo $firstName_err; ?></span>
            			</div>
            			<div class="form-group">
            				<label>Mobile Number: <sup style="color: red">*</sup> </label>
            				<input type="number" name="mobileNum" class="form-control" value="<?php echo $mobileNum ?>">
           
            			</div>
            			<div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
            				<label>Email Address: <sup style="color: red">*</sup></label>
            				<input type="email" name="email" class="form-control"> 
            				<span class="help-block"><?php echo $email_err; ?></span>
            			</div>
            			<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                			<label>Password:<sup style="color: red">*</sup></label>
                			<input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                			<span class="help-block"><?php echo $password_err; ?></span>
            			</div>
            			<div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                			<label>Confirm Password: <sup style="color: red">*</sup></label>
                			<input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                			<span class="help-block"><?php echo $confirm_password_err; ?></span>
            			</div>
            			<div class="form-group">
                        	<input type="submit" class="btn btn-primary" value="Submit">
                        	<a href="superadmin.php" class="btn btn-default">Cancel</a>
                    	</div>    
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>