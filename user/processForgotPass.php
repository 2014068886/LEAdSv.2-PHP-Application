<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Process</title>
</head>
    <body>
    <?php
   		include 'config.php';
   		
   		$u = $_POST['email'];
   		
   		$query = "select * from users where email=’$u'";
		$result = $link->query($query);
   		
		$row = $link->query($result);
		$toemailaddress=$row['email'];
		$password=$row['password'];
   		
		ini_set('display_errors', 1);
		error_reporting(~0);
   		
		$toemailaddress = "";
		$subjectline = "Check email for Your Password";
		$body ="Your Password is : ".$password;
   	
		require_once('class.phpmailer.php');
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->CharSet="UTF-8";
		$mail->SMTPSecure = 'ssl';
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 465;
		$mail->Username = 'you@gmail.com';
		$mail->Password = 'yellin101';
		$mail->SMTPAuth = true;
   		
		$mail->From = 'From 2014068886@ust-ics.mygbiz.com';
		$mail->FromName = 'From JM';
		$mail->AddAddress("$toemailaddress");
   		
		$mail->IsHTML(true);
		$mail->Subject    = "$subjectline";
		$mail->AltBody    = "To Read Email use HTML View";
		$mail->Body    = "$body";
   		
		$t = $mail->Send();

		$_SESSION['msg']="Check email for password";
		header('Location: forgotPass.php');
	?>
</body>
</html>