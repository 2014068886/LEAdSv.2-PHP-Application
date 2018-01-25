<?php
require_once 'config.php';

$username = $password = "";
$username_err = $password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
	// Check if username is empty or null
	if(empty(trim($_POST["username"]))){
		$username_err = 'Please enter username.';
	} else{
		$username = trim($_POST["username"]);
	}
	
	if(empty(trim($_POST["password"]))){
		$password_err = 'Please enter your password.';
	} else{
		$password = trim($_POST["password"]);
	}
	
	if(empty($username_err) && empty($password_err)){
		$sql = "SELECT username, password FROM superadmin WHERE username = ?";
		if($stmt = mysqli_prepare($link, $sql)){
			mysqli_stmt_bind_param($stmt, "s", $param_username);
	
			$param_username = $username;
	
			if(mysqli_stmt_execute($stmt)){
				mysqli_stmt_store_result($stmt);
				if(mysqli_stmt_num_rows($stmt) == 1){
					 
					mysqli_stmt_bind_result($stmt, $username, $hashed_password);
					if(mysqli_stmt_fetch($stmt)){
						if($password == $hashed_password){
							session_start();
							$_SESSION['username'] = $username;
							header("location: superadmin.php");
						} else{
							$password_err = 'The password you entered was not valid.';
						}
					}
				} else{
					$username_err = 'No account found with that username.';
				}
			} else{
				echo "Oops! Something went wrong. Please try again later.";
			}
		}
		mysqli_stmt_close($stmt);
	}
	mysqli_close($link);
	}
	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
    <body>
    <div class="wrapper">
        <h2>Super Admin Login</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" >
  		    <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username:<sup>*</sup></label>
                <input type="text" name="username"class="form-control">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password:<sup>*</sup></label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
            </div>
            <p>Not a Super Admin? Click <a href="http://localhost:88/LEAdS v.2/user/"> here </a> to Login </p>
        </form>
     </div>
    </body>
</html>