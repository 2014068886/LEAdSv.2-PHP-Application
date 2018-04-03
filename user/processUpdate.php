<?php
session_start();

if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype'])=='Admin')
{
  echo "<script>window.location.assign('login.php')</script>";
}

$username = $_SESSION['mysesi'];
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Insert title here</title>
</head>
    <body>
    <?php
		include 'config.php';
		
		$uname = $_POST['username'];
		$mobileNum = $_POST['mobileNum'];
		$email = $_POST['emailAdd'];
		
		if((!empty($username)) && (!empty($mobileNum)) && (!empty($email)) ){
			
			$con = new dbCon();
			$result = $con->updateProfile($uname, $email, $mobileNum, $username);
			
			header('location: adminProfile.php');
		} else {
			echo "alert('No values submitted!')";
			
		}
	?>
    </body>
</html>