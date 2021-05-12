<!DOCTYPE html>
<?php
session_start();
include("includes/connection.php");

if(!isset($_SESSION['user_email'])){
	header("location: index.php");
}
?>
<html>
<head>
	<title>Forgotten Password</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style/home_style2.css">
</head>
<style>
    body{
        overflow-x: hidden;
    }
    .main-content{ 
        width: 50%;
        height: 40%;
        margin: 10px auto;
        background-color: #fff;
        border: 2px solid #e6e6e6;
        padding: 40px 50px;
    }
    .header{
        border: 0px solid #000;
        margin-bottom: 5px;
    }
    .well{
        background-color: #368CCB;
    }
    #signup{
        width: 60%;
        border-radius: 30px;
    }
	.bruh {
  display: block;
  margin-left: 700px;
  margin-right: 860px;
  width: 80px;
  overflow: auto;
}
</style>
<body>
<div class="row">
    <div class="col-sm-12">
       <div class="well">
			<img src="images/Connex.png" class="bruh" title="Connex" width="80px" height="80px">
		</div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="main-content">
            <div class="header">
                <h3 style="text-align:center;"><strong>Change Your Password</strong></h3>
            </div>
            <div class="l_pass">
                <form action="" method="post">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="password" class="form-control" type="password" name="pass" placeholder="New Password" required>
                    </div><br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="password" type="password" class="form-control" placeholder="Re-enter Password" name="pass1" required>
                    </div><br>
                    <a style="text-decoration:none; float:right; color:#187FAB;" data-toggle="tooltip" title="Signin" href="signin.php">Back to Signin</a>
                    <center><button id="signup" class="btn btn-info btn-lg" name="change">Change Password</button></center>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php
    if(isset($_POST['change'])){
        $user = $_SESSION['user_email'];
		$get_user = "select * from users where user_email='$user'";
		$run_user = mysqli_query($con,$get_user);
		$row = mysqli_fetch_array($run_user);

        $user_name = $row['user_name'];
        
        global $con;
        $pass = htmlentities(mysqli_real_escape_string($con, $_POST['pass']));
        $pass1 = htmlentities(mysqli_real_escape_string($con, $_POST['pass1']));

        if($pass==$pass1){
            if(strlen($pass) >= 9 && strlen($pass) <= 60){
                $update = "update users set user_pass= '$pass' where user_id='$user_id'";

                $run = mysqli_query($con, $update);
                echo "<script>alert('Your password is changed')</script>";
                echo "<script>window.open('home.php','_self')</script>";
            }else{
                echo "<script>alert('Your password should be greater than 9 words')</script>";
            }
        }else{
            echo "<script>alert('Your password didn't match')</script>";
            echo "<script>window.open('change_password.php','_self')</script>";
        }
    }
?>
