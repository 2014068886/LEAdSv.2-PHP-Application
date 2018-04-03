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
    <link href="min/plugin-min.css" type="text/css" rel="stylesheet">
    <link href="min/custom-min.css" type="text/css" rel="stylesheet" >
     
    <link href="cs/perfect-scrollbar.css" type="text/css" rel="stylesheet">
    <link href="cs/prism.css" type="text/css" rel="stylesheet">
    <link href="cs/style-min.css" type="text/css" rel="stylesheet">
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/> 
      
      <script src="js/jquery-2.1.1.min.js" type="text/javascript"></script>
    
    <style type="text/css">
        body { 
        	font: 14px sans-serif;
        	display: table-cell;
    		vertical-align: middle;
  		}
        
        html, body {
    		height: 100%;
		}
		
		html {
    		display: table;
    		margin: auto;
		}
		
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
    <body class="cyan">
    <div class="container" style="width: 400px">
    <div id="login-page" class="row">
      <div class="col s12 z-depth-4 card-panel">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" >
        <div class="row">
          <div class="input-field col s12 center">
            <img src="img/logo.png" style="width:250px" alt="">
            <p class="center login-form-text"></p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12 <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="username" type="text" name="username" required="required">
            <label for="username" class="center-align">Username</label>
            <span class="help-block"><?php echo $username_err; ?></span>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12 <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password" type="password" name="password" required="required">
            <label for="password">Password</label>
            <span class="help-block"><?php echo $password_err; ?></span>
          </div>
        </div>
        <div class="row">          
          <div class="input-field col s12 m12 l12  login-text">
              <input type="checkbox" id="remember-me" />
              <label for="remember-me">Remember me</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <button type="submit" class="btn waves-effect waves-light col s12" name="login"> Login </button>
          </div>
        </div>
        <div class="row">
        	<div class="input-field col s20">
        		<center> <p class="margin medium-small">Not a Super Admin? Click <a href="http://localhost:88/LEAdS v.2/user/"> here </a> to Login </p> </center>
        	</div>
        </div>
      </form>        
       <!--  <h2>Super Admin Login</h2>
        <form >
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
            <p> </p>
        </form> -->
      </div>
    </div>
    </div>
    </body>
    <script src="js/prism.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<script src="js/perfect-scrollbar.js" type="text/javascript"></script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
    <!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>