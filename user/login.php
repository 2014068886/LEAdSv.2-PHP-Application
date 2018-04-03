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
	<?php
if(isset($_POST['username']) && isset($_POST['password'])){
  $mysqli = new mysqli("127.0.0.1", "root", "12345", "leads");
  if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
  }
  $res = $mysqli->query("SELECT * FROM users where username='".$_POST['username']."' and password='".$_POST['password']."'");
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
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
  <strong>No User Type Found!</strong>
</div>
<?php
    }
  } else{
?>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">x</span><span class="sr-only">Close</span></button>
  <strong>Warning!</strong> This username or password not same with database.
</div>
<?php
  }
}
?>
		<div class="container-fluid">
			<div class="row is-flex">
				<div class="col-sm-6 align-self-center text-center">
					<img src="LEAdS Logo_green.png" class="logo">
				</div>
				<div class="col-sm-6 align-self-center text-center">
					<div class="container-white">
						<h2>WELCOME!</h2><br>
						<div class="form-group">
						  <form method="post" role="form">
  							<input type="text" class="form-control" id="username" name="username" style="text-align: center;" placeholder="Username" required="required"> <br>
						  	<input type="password" class="form-control" id="password" name="password" style="text-align: center;" placeholder="Password" required="required"> <br><br>
						
							<a href="forgotPass.php">Forgot password?</a><br> <br>

							<input type="submit" class="btn btn-info" value="LOGIN" name="login"> <br><br>
						  </form>
							<i><a href="register.php">REGISTER here!</a><br></i>
							
							<p>Click <a href="http://localhost:88/LEAdS v.2/superadmin/index.php"> here </a> to Login as Super Admin. </p>
						</div>
					</div>
				</div>
			</div>


		</div>
</body>
<script src="https://www.gstatic.com/firebasejs/4.12.1/firebase.js"></script>
<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyBhEnZMKb3lpoj_CvYmnvInhPc1MN0PwGU",
    authDomain: "leadsmobileapp.firebaseapp.com",
    databaseURL: "https://leadsmobileapp.firebaseio.com",
    projectId: "leadsmobileapp",
    storageBucket: "leadsmobileapp.appspot.com",
    messagingSenderId: "685935317906"
  };
  firebase.initializeApp(config);
</script>

	<script src="js/jquery-2.1.1.min.js"></script>
	<script src="js/bootstrap.js"></script>
</html>