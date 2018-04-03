<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Insert title here</title>
</head>
    <body>
    <?php
		include 'config.php';
		
		$email = $_POST['email'];
		$feedback = $_POST['message'];
		
		if( (!empty($email)) && (!empty($feedback)) )  
		{
			$con = new dbCon();
			
			$res = $con->insertFeedback($email, $feedback);
			
			header('location: admin.php');
			
		} else 
		{
			
		}
	?>
    </body>
</html>