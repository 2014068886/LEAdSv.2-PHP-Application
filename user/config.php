<?php
define('DB_SERVER', '127.0.0.1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '12345');
define('DB_NAME', 'leads');
 
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$database = DB_NAME; 

if($link === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

class dbCon 
{
	public function selectProfile($username)
	{
		$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
		$res=$link->query("SELECT * FROM users where username='".$username."'");
		return $res;
	}
	
	public function updateProfile($username, $email, $mobileNum, $unameSession)
	{
		$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
		$res=$link->query("UPDATE users set username='".$username."', email='".$email."', mobileNum='".$mobileNum."' where username='".$unameSession."'");
		return $res;
	}
	
	public function insertFeedback($email, $message){
		$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
		$res=$link->query("INSERT INTO feedback (email,feedback) values ('".$email."','".$message."')");
		return $res;
	}
	
	public function verifyUser(){
		
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
		
	}

	public function registerUser(){
		$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
		
	}
	
}

?>