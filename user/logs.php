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

    <link href="min/plugin-min.css" type="text/css" rel="stylesheet">
    <link href="min/custom-min.css" type="text/css" rel="stylesheet" >
   
  <!--  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-lite/1.1.0/material.min.css"> -->
  
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/> 
  
  <link rel="stylesheet" href="css/preloader.css" type="text/css"/>
  <script src="js/preloader.js"></script>
	
  <link type="text/css" rel="stylesheet" src="https://cdn.datatables.net/1.10.16/css/dataTables.material.min.css"/>
	
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/materialize.min.js"></script>
<body>
<div class="preloader-background">
	<div class="preloader-wrapper big active">
		<div class="spinner-layer spinner-blue-only">
			<div class="circle-clipper left">
				<div class="circle"></div>
			</div>
			<div class="gap-patch">
				<div class="circle"></div>
			</div>
			<div class="circle-clipper right">
				<div class="circle"></div>
			</div>
		</div>
	</div>
</div>

<div id="loader-wrapper">
    <div id="loader"></div>
 
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
 
</div>

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
                    <li class="active"><a href="logs.php"> Logs</a></li>
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
<br/><br/>
<main>
	<?php
		include 'config.php';
		$result = $link->query("SELECT * FROM logs ORDER BY reference DESC");	  	
	 ?>
	 
    <div class="container">
    	 <table id="table_id" class="mdl-data-table">
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
					<td> <?php echo $data['level']; ?> </td>
    			</tr>
    		<?php
	  			}
	  			
	  		?>
    	</tbody>	
    </table>
    
    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Generate Daily Report</button>
	<button type="button" class="btn btn-info" data-toggle="modal" data-target="weekly">Generate Weekly Report</button>
    <form class="form-horizontal" action="generateCSV.php" method='post' enctype="multipart/form-data">
           <input type="submit" name="exportDB" class="btn btn-success" value="Export Data to CSV"/>
  
    </form> 	
    
 
    
    <!-- Modal Trigger -->
  <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Modal</a>
    
  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Modal Header</h4>
      <p>A bunch of text</p>
    </div>
    <div class="modal-footer">
      <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>
  
    <script>
          $(document).ready(function(){
    	    $('.modal-trigger').leanModal();
    	  });
    	          
    </script>    
   
    
    <!-- Modal Structure -->
    <div id="modal1" class="modal">
      <div class="modal-content">
         <h4>Daily Report</h4>
         <form action="generateDailyPDF.php" method="post">
          			<label> Day </label>
          			<input type="date" name="day" id="day" placeholder="Enter day" class="form-control" required="required"/> <br>
      </div>
      <div class="modal-footer">
          <input type="submit" value="SUBMIT" class="modal-action modal-close waves-effect waves-green btn-flat"/> <input type="reset" value="RESET" class="modal-action modal-close waves-effect waves-green btn-flat"/> 
         </form>
      </div>
    </div>

   
    
  	<div class="modal" id="myModal" role="dialog">
    	<div class="modal-dialog">
    
      		<!-- Modal content-->
      		<div class="modal-content">
        		<div class="modal-header">
          			<button type="button" class="close" data-dismiss="modal">&times;</button>
          			<h4 class="modal-title">Daily Report</h4>
        		</div>
        		<div class="modal-body">
        		
        		</div>
      		</div>
    	</div>
  	</div>
    
    <div class="modal" id="weekly">
    
      		<!-- Modal content-->
      		<div class="modal-content">
        		<div class="modal-header">
          			<button type="button" class="close" data-dismiss="modal">&times;</button>
          			<h4 class="modal-title">Weekly Report</h4>
        		</div>
        		<div class="modal-body">
        		<form action="generateWeeklyPDF.php" method="post">
          		
          			<input type="submit" value="SUBMIT" class="btn btn-submit"/> <input type="reset" value="RESET" class="btn btn-submit"/> 
        		</form>
        		</div>
      		</div>
    	
  	</div>
    	
 
    	<form class="form-horizontal" method="post" action="generatePdf.php">
			<button type="submit" id="pdf" name="generate_pdf" class="btn btn-primary"> Generate PDF</button>
		</form>
	</div>
	</main>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
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