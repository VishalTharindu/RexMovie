<?php
    
    session_start();
    include("phpcode/db.inc.php");
    
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
	<link rel ="stylesheet" href ="resources/css/boostrap/bootstrap.min.css">
    <link rel ="stylesheet" href ="resources/font-awesome/css/font-awesome.min.css">
	<link rel ="stylesheet" type ="text/css" href="resources/css/loging.css">
    
	<script src ="resources/js/jquery-3.3.1.min.js"></script>
	<script src ="resources/js/popper.min.js"></script>
	<script src ="resources/js/bootstrap.min.js"></script>
	
</head>
<body>
    
<!--        #########header include here#############-->
        <?php
            
            include("incfile/header.php");
        ?>
<!--        #############################################-->
    
	<div class ="modal-dialog text-center">
		<div class ="col-md-12">
			<div class="modal-content">
			<div class="col-md-12 user-img">
				<img src ="resources/img/user.png">
					<form method="POST">
						<div class ="form-group">
							<input type="email" class="form-control" name="username" placeholder="Enter User Email">
						</div>
						<div class ="form-group">
							<input type="password" class="form-control" name="password" placeholder="Enter Password">
						</div>
						<button type ="submit" name="submit" class ="btn btn-danger">Login</button>
					</form>
                </div>
				<div class="col-12 forgot">
                    <span>Not Registerd?<a href="Singup1.php">singup now</a></span>
                </div>
            </div>
        </div>
    </div>
    <?php
            
            include("incfile/footer.php");
    ?>
     
</body>
</html>
<?php
    
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        if(empty($username) || empty($password)){
            echo "<script>alert('Enter UserName / Password to login')</script>";
        }
        else{
            $ecyPassword = md5($password);
//            echo $ecyPassword;
            $sql = "SELECT * FROM user WHERE userEmail='$username' AND password='$ecyPassword'";
            $chkLogin = mysqli_query($conn,$sql);
            $chkLoginRow = mysqli_num_rows($chkLogin);
            if($chkLoginRow > 0){
                $_SESSION['useremail'] = $username;
//                echo "<script>alert('loging success')</script>";
                echo "<script>window.open('movie.php','_self')</script>";
            }
            else{
                 echo "<script>alert('Wrong UserName / Password')</script>";
            }
        }
    }
?>
