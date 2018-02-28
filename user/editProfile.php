<?php
    session_start();
    
    if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype'])=='User')
    {
    	echo "<script>window.location.assign('login.php')</script>";
    }
    
    $username = $_SESSION['mysesi'];
 
    include 'config.php';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
    	
    	$uname = trim($_POST['username']);
    	$email = trim($_POST['email']);
    	$fname = trim($_POST['fname']);
    	$lname = trim($_POST['lname']);
    	$mobileNum = trim($_POST['mobileNum']);
    	
    	$query = "UPDATE users set username='".$uname."', email='".$email."', firstName='".$fname."', lastName='".$lname."', mobileNum='".$mobileNum."' where username = '".$username."'";
    	
    	$result = mysqli_query($link, $query);
    	
    	mysqli_close($link);
    	echo "<script>window.location.assign('profile.php')</script>";
    }
?>