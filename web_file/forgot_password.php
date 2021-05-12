<!DOCTYPE html>
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
  margin-left: 660px;
  margin-right: 860px;
  width: 236px;
  overflow: auto;
}
</style>
<body>
<div class="row">
    <div class="col-sm-12">
        <div class="well">
			<img src="images/Connex1.png" class="bruh" title="Connex" width="236px" height="80px">
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="main-content">
            <div class="header">
                <h3 style="text-align:center;"><strong>Forgot Password</strong></h3>
            </div>
            <div class="l_pass">
                <form action="" method="post">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="email" class="form-control" type="email" name="email" placeholder="Enter your email" required>
                    </div>  
                    <hr>
                    <pre class="text">Enter your bestfriend name down below?</pre>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
                        <input id="msg" type="text" class="form-control" placeholder="Someone" name="recovery_account" required>
                    </div><br>
                    <a style="text-decoration:none; float:right; color:#187FAB;" data-toggle="tooltip" title="Signin" href="signin.php">Back to Signin</a>
                    <center><button id="signup" class="btn btn-info btn-lg" name="submit">Submit</button></center>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php
session_start();

include("includes/connection.php");

	if (isset($_POST['submit'])) {

		$email = htmlentities(mysqli_real_escape_string($con, $_POST['email']));
        $recovery_account = htmlentities(mysqli_real_escape_string($con,$_POST['recovery_account']));
        

        $select_user = "select * from users where user_email='$email' AND recovery_account='$recovery_account'";
        
		$query= mysqli_query($con, $select_user);
		$check_user = mysqli_num_rows($query);

		if($check_user == 1){
			$_SESSION['user_email'] = $email;

			echo "<script>window.open('change_password.php', '_self')</script>";
		}else{
			echo"<script>alert('Your Email or Bestfriend is incorrect')</script>";
		}
	}
?>