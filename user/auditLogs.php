<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title> Notification Logs </title>

  <link href="min/plugin-min.css" type="text/css" rel="stylesheet">
  <link href="min/custom-min.css" type="text/css" rel="stylesheet" >
   
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.material.min.css">
  <!--  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css"> -->
  
  <link rel="stylesheet" href="css/bootstrap.css">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/> 
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script>
	 $(document).ready(function(e){
		$(".dropdown-button").dropdown();
	 });
  </script>
</head>
<body>
<div class="navbar-fixed">
<ul id="dropdown1" class="dropdown-content">
  <li><a href="adminPassword.php">Change Password</a></li>
    <li class="divider"></li>
  <li><a href="adminFAQ.php">FAQ</a></li>
</ul>
    <nav id="nav_f" class="default_color" role="navigation">
    	<div class="container">
        <div class="nav-wrapper">
            <a href="admin.php" id="logo-container" class="brand-logo"><img src="img/logo_white.png" style="width:140px" /> </a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="admin.php">Home</a></li>
                    <li><a href="logs.php"> Logs</a></li>
                    <li><a href="adminProfile.php">Profile</a></li>
                    <li><a href="notification.php">Notification</a></li>
                    <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Settings<i class="material-icons right">arrow_drop_down</i></a></li>
                    <li><a href="logout.php"> Sign Out</a> </li>
                </ul>
                <ul id="nav-mobile" class="side-nav">
                    <li><a href="#intro">About</a></li>
                    <li><a href="#order">Order</a></li>
                    <li><a href="#team">Team</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
        </div>
        </div>
    </nav>
</div>
<br/>
<div class="container">
	
	<a href="notification.php" class="waves-effect waves-light btn"><i class="material-icons left">arrow_back</i>back</a> <br/><br/>
	
	<?php
		include 'config.php';
		$result = $link->query("SELECT * FROM notifications");	  	
	 ?>
	 
	<table id="table_id" class="display">
    		<thead>
    			<tr>
    				<th> ID </th>
    				<th> Description </th>
    				<th> Level </th>
    				<th> Date </th>
    			</tr>
    		</thead>
    		<tbody>
    		 <?php
	  			while($data = $result->fetch_assoc())
	  			{
	  		 ?>
    			<tr>
    				<td> <?php echo $data['id']; ?></td>
    				<td> <?php echo $data['description']; ?></td>
    				<td> <?php echo $data['level']; ?></td>
    				<td> <?php echo $data['date']; ?></td>
    			</tr>
    		<?php
	  			}
	  		?>
    	</tbody>	
    </table>
</div> <br/><br/>
</body>      
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/dataTables.material.min.js"></script>
  
  <script>
    $(document).ready(function() {
        $('#table_id').DataTable( {
            columnDefs: [
                {
                    targets: [ 0, 1, 2 ],
                    className: 'mdl-data-table__cell--non-numeric'
                }
            ]
        } );        
    } );
  </script>
</html>