<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
     <style>
		body {
    		background-image: url('landslide-1.jpg');
    		background-size: 1380px 650px;
    		color: black;
    		font-family: verdana;
    	}
</style>
  </head>
  <body>
  <p>&nbsp;</p><br><br>
  <div class="container" style="width: 600px">
   
<?php
/*$username=$_POST['username'];
$password=md5($_POST['password']);
$login=$_POST['login']; */
if(isset($_POST['username']) && isset($_POST['password'])){
  $mysqli = new mysqli("127.0.0.1", "root", "12345", "leads");
  if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  }
  $res = $mysqli->query("SELECT * FROM users where username='".$_POST['username']."' and password='".md5($_POST['password'])."'");
  $row = $res->fetch_assoc();
  $name = $row['firstName'];
  $user = $row['username'];
  $pass = $row['password'];
  $type = $row['user_type'];
  if($user==$_POST['username'] && $pass=$_POST['password']){
    session_start();
    if($type=="Admin"){
      $_SESSION['mysesi']=$user;
      $_SESSION['mytype']=$type;
      echo "<script>window.location.assign('admin.php')</script>";
    } else if($type=="User"){
      $_SESSION['mysesi']=$user;
      $_SESSION['mytype']=$type;
      echo "<script>window.location.assign('index.php')</script>";
    } else{
?>
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
  <strong>No User Type Found!</strong>
</div>
<?php
    }
  } else{
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
  <strong>Warning!</strong> This username or password not same with database.
</div>
<?php
  }
}
?>
   
    <div class="panel panel-default">
      <div class="panel-body">
     	<div class="col-md-12">
    <h2 align="center">Login</h2>
    <form role="form" method="post">
      <div class="form-group">
 <label for="username">Username</label>
 <input type="text" class="form-control" id="username" name="username">
      </div>
      <div class="form-group">
 <label for="password">Password</label>
 <input type="password" class="form-control" id="password" name="password">
      </div>
      <button type="submit" name="login" class="btn btn-primary">Login</button><br>
      <center> <a href="forgotPass.php"> Forgot Password? </a> </center>
<br> <p>Don't have an account? <a href="register.php">Sign up now</a></p>
<p>Click <a href="http://localhost:88/LEAdS v.2/superadmin/index.php"> here </a> to Login as Super Admin. </p>
    </form>
       </div>
      </div>
     </div>
     
  </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
    <!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html> 