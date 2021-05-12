<!DOCTYPE html>
<?php
session_start();
include("includes/header.php");

if(!isset($_SESSION['user_email'])){
	header("location: index.php");
}
?>
<html>
<head>
	<title>Friends</title>
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style/home_style2.css">
	<style>
		#find_people{
			border: 5px solid #e6e6e6;
			padding: 40px 50px;
		}
		#result_posts{
			border: 5px solid #e6e6e6;
			padding: 40px 50px;
		}
		form.search_form input[type=text]{
			padding: 10px;
			font-size: 17px;
			border-radius: 4px;
			border: 1px solid grey;
			float: left;
			width: 80%;
			background: #f1f1f1;
		}
		form.search_form button{
			float:left;
			width:20%;
			padding:10px;
			font-size:17px;
			border:1px solid grey;
			border-left: none;
			cursor:pointer;
		}
		form.search_form button:hover {
			background: #ob7dda;
		}
		form.search_form: :after{
			content:"";
			clear: both;
			display: table;
		}
	</style>
</head>
<body>
	<div class="row">
		<div class="col-sm-12">
			<center><h2>Friend List</h2></center><br><br>
			<div class="row">
				<div class="col-sm-4">
				</div>
				<div class="col-sm-4">
					<form class="search_form" action="">
						<input type="text" placeholder="Search Friend" name="search_user">
						<button class="btn btn-info" type="submit" name="search_user_btn">Search</button>
					</form>
				</div>
				<div class="col-sm-4">
				</div>
			</div><br><br>
			<?php 
				global $con;
				$get_friends ="select * from relation where froms='$user_id' AND status='F'";
				$run_friends = mysqli_query($con,$get_friends);
				while($row_friends=mysqli_fetch_array($run_friends)){
					$to = $row_friends['tos'];
					
					$get_users ="select * from users where user_id='$to'";
					$run_users = mysqli_query($con,$get_users);
					while($row_user=mysqli_fetch_array($run_users)){
						$user_id = $row_user['user_id'];
			$f_name = $row_user['f_name'];
			$l_name = $row_user['l_name'];
			$username = $row_user['user_name'];
			$user_image = $row_user['user_image'];

			echo"
				<div class='row'>
					<div class='col-sm-3'>
					</div>
					<div class='col-sm-6'>
						<div class='row' id='find_people'>
							<div class='col-sm-4'>
								<a href='user_profile.php?u_id=$user_id'>
								<img src='users/$user_image' width='150px' height='140px' title='$username' style='float:left; margin:1px;'/>
								</a>
							</div><br><br>
							<div class='col-sm-6'>
								<a style='text-decoration:none; cursor:pointer; color:#3897f0;' href='user_profile.php?u_id=$user_id'>
								<strong><h2>$f_name $l_name</h2></strong>
								</a>
							</div>
							<div class='col-sm-3'>
							</div>
						</div>
					</div>
					<div class='col-sm-4'>
					</div>
				</div><br>
			";	
					}
				
				
				}
				
				
			?>
		</div>
	</div>
</body>
</html>