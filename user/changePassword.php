<?php
session_start();

if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype'])=='User')
{
	echo "<script>window.location.assign('login.php')</script>";
}


include 'config.php';

$oldPassword = $password = $confirm_password = "";
$old_password_err = $password_err = $confirm_password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

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
	
	if(empty($password_err) && empty($confirm_password_err) && empty($old_password_err)){
		$sql = "UPDATE users SET password=? WHERE username=?";
		if($stmt = $link->prepare($sql)){
			$stmt->bind_param("ss", $param_password, $param_username);
		
			$param_password = $password;
			$param_username = $_SESSION['mysesi'];
		
			if($stmt->execute()){
				header("location: index.php");
				exit();
			} else{
				echo "Something went wrong. Please try again later.";
			}
			$stmt->close();
		}
	}
	
}

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Change Password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"> LEAdS v.2</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="index.php">Home</a></li>
      <li><a href="profile.php">Profile</a></li>
      <li class="dropdown"> <a class = "dropdown-toggle" data-toggle = "dropdown" href="#"> <b> Settings </b> <span class = "caret"> </span> </a> 
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
<div class="container">
<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
             <div class="col-md-12">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" style="width:300px;">
     		<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>New Password:<sup style="color: red">*</sup></label>
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
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
        </form>
        </div>
       </div>
     </div>
  </div>
</div>
</body>
</html>