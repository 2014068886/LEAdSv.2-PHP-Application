<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Insert title here</title>
</head>
    <body>
    <?php
		include 'config.php';
		if(isset($_POST['exportDB'])){
			$con = new dbCon();
			$email = $_POST['email'];
			$feedback = $_POST['message'];
			$res = $con->insertFeedback($email, $feedback);
				
			header('location: admin.php');
		}
		
	?>
    </body>
</html>