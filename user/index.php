<?php
session_start();

if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype'])=='User')
{
  echo "<script>window.location.assign('login.php')</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
    
 		
 		
    	
    </style>
  </head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"> LEAdS v.2</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="profile.php">Profile</a></li>
      <li class="dropdown"> <a class = "dropdown-toggle" data-toggle = "dropdown" href="#"> Settings <span class = "caret"> </span> </a> 
      	 <ul class="dropdown-menu">
      	 	<li> <a href="changePassword.php"> Change Password </a> </li>
      	 	<li> <a href="faq.php"> FAQ </a> </li>
      	 </ul>
      </li>
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li> <a href="logout.php"><span class="glyphicon glyphicon-log-out"> </span> Sign Out</a> </li>
    </ul>
  </div>
</nav>
  <div class="container"> 
      <h2> <center> Welcome, <?php echo $_SESSION['mysesi'] ?> </center> </h2>     

      <div class= "wrapper" align="center"> 
      <br>
		<font size=2 >Battery <a id="bat"></a>%</font> 
		<table border="1">
			<td width="180px">Location</td> 
			<td width="210px"><a id="loc"> </td>
			<tr> 
				<td width="80px">Movement</td> 
				<td id="gg2" width="40px"><a id="deg"> </a> </td>
			</tr> 
			<tr> 
				<td width="80px">Moisture</td> 
				<td width="40px"><a id="mois"> </a> %</td> 
			</tr> 
			<tr> 
				<td width="80px">Rain</td> 
				<td width="40px"><a id="rain"> </a> mL</td> 
			</tr> <p> </p> <p> </p> 
			<td width="80px">Alert Level</td> 
			<td width="40px"><a id="level"> </a> </td> 
			<tr> 
			</tr>
		</table> <p>&nbsp;</p> <p>&nbsp;</p> 
		<a href="http://admin:admin@192.168.2.10/">IP CAMERA</a> 
	</div>
		<iframe id="f1" frameborder="0" src=""><iframe> <iframe id="f2" src=""></iframe>

	</div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>  

<?php 

/*    include 'config.php';

$username = $password = "";
$username_err = $password_err = "";

// Processing form data when login form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

// Check if username is empty or null
if(empty(trim($_POST["username"]))){
$username_err = 'Please enter username.';
} else{
$username = mysqli_real_escape_string($link, trim($_POST["username"]));
}

if(empty(trim($_POST["password"]))){
$password_err = 'Please enter your password.';
} else{
$password = mysqli_real_escape_string($link, trim($_POST["password"]));
}

if(empty($username_err) && empty($password_err)){
$sql = "SELECT username,password,user_type FROM users WHERE username=?";

if($stmt = mysqli_prepare($link, $sql)){
mysqli_stmt_bind_param($stmt, "s", $param_username);

$param_username = $username;

if(mysqli_stmt_execute($stmt)){
mysqli_stmt_store_result($stmt);
if(mysqli_stmt_num_rows($stmt) == 1){
 
mysqli_stmt_bind_result($stmt, $username, $hashed_password);
if(mysqli_stmt_fetch($stmt)){
if(password_verify($password, $hashed_password)){
session_start();
$_SESSION['username'] = $username;
$_SESSION['utype'] = $userdata['user_type'];

if($_SESSION['utype'] == "Admin"){
header("location: admin.php");
} else {
header("location: welcome.php");
}
} else{
$password_err = 'The password you entered was not valid.';
}
}
} else {
 
$username_err = 'No account found with that username.';
}
} else {
echo "Oops! Something went wrong. Please try again later.";
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
<title>Login</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<style type="text/css">
body{ font: 14px sans-serif; }
.wrapper{ width: 350px; padding: 20px; }
</style>
</head>
<body>
<div class="wrapper">
<h2>Login</h2>
<p>Please fill in your credentials to login.</p>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
<label>Username:<sup>*</sup></label>
<input type="text" name="username"class="form-control" value="<?php echo $username ?>">
<span class="help-block"><?php echo $username_err; ?></span>
</div>
<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
<label>Password:<sup>*</sup></label>
<input type="password" name="password" class="form-control" value="<?php echo $password ?>">
<span class="help-block"><?php echo $password_err; ?></span>
</div>
<div class="form-group">
<input type="submit" class="btn btn-primary" value="Submit">
</div>
<p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
<p>Click <a href="http://localhost:88/LEAdS v.2/superadmin/index.php"> here </a> to Login as Super Admin. </p>
</form>
</div>
</body>
</html>

*/
?>