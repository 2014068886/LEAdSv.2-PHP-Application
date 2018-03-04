<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
<title>Insert title here</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	 
	// updating the view with notifications using ajax
	 
	function load_unseen_notification(view = '')
	 
	{
	 
	 $.ajax({
	 
	  url:"http://localhost:88/LEAdS%20v.2/user/fetch.php",
	  method:"POST",
	  data:{view:view},
	  dataType:"json",
	  success:function(data)
	 
	  {
	 
	   $('.dropdown-menu').html(data.notification);
	 
	   if(data.unseen_notification > 0)
	   {
	    $('.count').html(data.unseen_notification);
	   }
	 
	  }
	 
	 });
	 
	}
	 
	load_unseen_notification();
	 
	// submit form and get new records
	 
	$('#comment_form').on('submit', function(event){
	 event.preventDefault();
	 
	 if($('#subject').val() != '' && $('#comment').val() != '')
	 
	 {
	 
	  var form_data = $(this).serialize();
	 
	  $.ajax({
	 
	   url:"http://localhost:88/LEAdS%20v.2/user/insert.php",
	   method:"POST",
	   data:form_data,
	   success:function(data)
	 
	   {
	 
	    $('#comment_form')[0].reset();
	    load_unseen_notification();
	 
	   }
	 
	  });
	 
	 }
	 
	 else
	 
	 {
	  alert("Both Fields are Required");
	 }
	 
	});
	 
	// load new notifications
	 
	$(document).on('click', '.dropdown-toggle', function(){
	 
	 $('.count').html('');
	 
	 load_unseen_notification('yes');
	 
	});
	 
	setInterval(function(){
	 
	 load_unseen_notification();;
	 
	}, 5000);
	 
	});
</script> 
</head>
<body> 
<nav class="navbar navbar-inverse">
   <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"> LEAdS v.2</a>
    </div>
    <ul class="nav navbar-nav">
      <li> <a href="admin.php">Home</a></li>
      <li> <a href="logs.php"> Logs </a> </li>
      <li> <a href="adminProfile.php">Profile</a></li>
      <li class="active"> <a href="notification.php">Notification</a></li>
      <li class="dropdown"> <a class = "dropdown-toggle" data-toggle = "dropdown" href="#"> Settings <span class = "caret"> </span> </a> 
      	 <ul class="dropdown-menu">
      	 	<li> <a href="adminPassword.php"> Change Password </a> </li>
      	 	<li> <a href="adminFAQ.php"> FAQ </a> </li>
      	 </ul>
      </li>
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
 			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-bell" style="font-size:18px;"></span></a>
      		<ul class="dropdown-menu"></ul>
      </li>
      <li> <a href="logout.php"><span class="glyphicon glyphicon-log-out"> </span> Sign Out</a> </li>
    </ul>
  </div>
</nav>
<br/>
<div class="container">
  <form method="post" action="insert.php">
   <div class="form-group">
    <label>Enter Subject</label>
    <input type="text" name="subject" id="subject" class="form-control">
   </div>
 
   <div class="form-group">
    <label>Enter Comment</label>
    <textarea name="comment" id="comment" class="form-control" rows="4"></textarea>
   </div>
 
   <div class="form-group">
    <input type="submit" name="post" id="post" class="btn btn-info" value="SUBMIT" />
    <input type="reset" class="btn btn-info" value="RESET"/>
   </div>
  </form>
  
  <?php 
  include 'config.php';
   
  $result = $link->query("SELECT * FROM comments");
  $row = $result->fetch_assoc();
  $comment_subject = $row['comment_subject'];
  $comment_text = $row['comment_text'];
  echo
  "<div class = 'col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad'>
        <div class = 'panel panel-info'>
            <div class = 'panel-heading'>
                <h3 class = 'panel-title' align = 'center'> <font face = 'century' color='black'> Notifications </font> </h3>
            </div>
            <div class = 'panel-body'>
    		<div class='row'>
    		<div class = 'col-md-12 col-lg-12'>
    			<table class = 'table table-user-information'>
    				<tr>
    				<th> Subject </th>
    				<td>" .$comment_subject. " </td>
    				</tr>
    				<tr>
    				<th> Comment </th>
    				<td>" .$comment_text." </td>
      				</tr>
				</table>
			</div>
		</div>";
  
  
  ?>
</div>
</body>
</html>