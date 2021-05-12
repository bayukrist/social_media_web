<?php
session_start();

include("includes/connection.php");

	if (isset($_POST['login'])) {

		$email = htmlentities(mysqli_real_escape_string($con, $_POST['email']));
		$pass = htmlentities(mysqli_real_escape_string($con, $_POST['pass']));

		if($email == "admin@mail.com" && $pass == "admin1234"){
			$_SESSION['user_email'] = $email;
			echo "<script>window.open('home_admin.php', '_self')</script>";
		}else{
			$select_user = "select * from users where user_email='$email' AND user_pass='$pass' AND status='verified'";
			$query= mysqli_query($con, $select_user);
			$check_user = mysqli_num_rows($query);
	
			if($check_user == 1){
				$_SESSION['user_email'] = $email;
				
				
				$get_post = "select * from posts";
				$run_post = mysqli_query($con, $get_post);
				$row = mysqli_fetch_array($run_post);
				$like_check_default = 0;
				$update_post = "update posts set like_check='$like_check_default'"; 
				
				$run_update = mysqli_query($con,$update_post);
				echo "<script>window.open('home.php', '_self')</script>";
				
				
			}else{
				echo"<script>alert('Your Email or Password is incorrect')</script>";
			}
		}
	}
?>