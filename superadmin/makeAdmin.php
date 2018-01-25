<?php
require_once 'config.php';
$user_type_err = "";
 
if(isset($_POST["id"]) && !empty($_POST["id"])){
    $id = $_POST["id"];
    $user_type = $_POST["user_type"];
    
    if(empty($user_type_err)){
        $sql = "UPDATE users SET user_type=? WHERE user_id=?";
 
        if($stmt = $link->prepare($sql)){
            $stmt->bind_param("ss", $param_user_type, $param_id);
            
            $param_user_type = $user_type;
            $param_id = $id;
            
            if($stmt->execute()){
                header("location: superadmin.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
            $stmt->close();
        }
    }
	$link->close();
} else{
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        $id =  trim($_GET["id"]);
        
        $sql = "SELECT * FROM users WHERE user_id = ?";
        if($stmt = $link->prepare($sql)){
            $stmt->bind_param("i", $param_id);
            $param_id = $id;
            
            if($stmt->execute()){
                $result = $stmt->get_result();
                
                if($result->num_rows == 1){
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    $user_type = $row["user_type"];
                } else{
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            $stmt->close();
        }
        $link->close();
    }  else{
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Update Record</h2>
                    </div>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
          
               			<div class="form-group <?php echo (!empty($user_type_err)) ? 'has-error' : ''; ?>">
                            <label>User Type</label>                            
                            <select id="user_type" name="user_type" class="form-control" style="width: 150px">
                            	<option value="Admin"> Admin </option>
                            	<option value="User"> User </option>
                            </select>
                            <span class="help-block"><?php echo $user_type_err;?></span>
               			</div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="superadmin.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>