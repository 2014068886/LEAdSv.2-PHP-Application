<?php
session_start();

if (!isset($_SESSION['mysesi']) && !isset($_SESSION['mytype'])=='Admin')
{
  echo "<script>window.location.assign('login.php')</script>";
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>LOGS</title>
</head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
   <body>
   <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"> LEAdS v.2</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="admin.php">Home</a></li>
      <li class="active"> <a href="logs.php"> Logs </a> </li>
      <li><a href="adminProfile.php">Profile</a></li>
      <li> <a href="notification.php">Notification</a></li>
      <li class="dropdown"> <a class = "dropdown-toggle" data-toggle = "dropdown" href="#"> Settings <span class = "caret"> </span> </a> 
      	 <ul class="dropdown-menu">
      	 	<li> <a href="adminPassword.php"> Change Password </a> </li>
      	 </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li> <a href="logout.php"><span class="glyphicon glyphicon-log-out"> </span> Sign Out</a> </li>
    </ul>
  </div>
</nav>
	<?php
		include 'config.php';
		$result = $link->query("SELECT * FROM logs ORDER BY reference DESC");	  	
	 ?>
	 
    <div class="container">
    	<form class="form-horizontal" action="generateCSV.php" method='post' enctype="multipart/form-data">
                  <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                                <input type="submit" name="exportDB" class="btn btn-success" value="Export Data to CSV"/>
                            </div>
                   </div>                    
        </form>  
    	<br /><br />
    	<table class=table table-bordered>
    		<thead>
    			<tr>
    				<th> Reference </th>
    				<th> Location </th>
    				<th> Moisture </th>
    				<th> Rain </th>
    				<th> Movement </th>
    				<th> Date </th>
    				<th> Level </th>
    			</tr>
    		</thead>
    		<tbody>
    		 <?php
	  			while($data = $result->fetch_assoc())
	  			{
	  		 ?>
    			<tr>
    				<td> <?php echo $data['reference']; ?></td>
    				<td> <?php echo $data['location']; ?></td>
    				<td> <?php echo $data['moisture']; ?></td>
    				<td> <?php echo $data['rain']; ?></td>
    				<td> <?php echo $data['movement']; ?></td>
    			 	<td> <?php echo $data['date']; ?></td>
					<td> <?php echo $data['level']; ?></td>
    			</tr>
    		<?php
	  			}
	  		?>
    		</tbody>	
    	</table>
    	<form class="form-horizontal" method="post" action="generatePdf.php">
			<button type="submit" id="pdf" name="generate_pdf" class="btn btn-primary"> Generate PDF</button>
		</form>
	</div>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>