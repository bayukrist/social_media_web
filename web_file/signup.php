<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
	body{
		overflow-x: hidden;
		background-color: var(--bg-color);
		color: var(--font-color);
	}
	.main-content{
		width: 50%
		height: 40%
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
		background-color: var(--secondary-color);
    color: var(--heading-color);
	}
	#signup{
		width: 60%;
		border-radius: 30px;
	}
	:root {
		--primary-color: #302AE6;
    --secondary-color: #368CCB;
    --font-color: #424242;
    --bg-color: #fff;
    --heading-color: #292922;
	}
	[data-theme="dark"] {
		--primary-color: #9A97F3;
    --secondary-color: #9999ff;
    --font-color: #e1e1ff;
    --bg-color: #161625;
    --heading-color: #818cab;
	}

	.header {
		background-color: var(--bg-color);
    color: var(--secondary-color);
    /*styles tambahan*/
    .....
}
.a {
    color: var(--font-color);
    /*styles tambahan*/
    .....
}
	.theme-switch-wrapper {
  display: flex;
  align-items: center;
  .em {
    margin-left: 10px;
    font-size: 1rem;
  }
}
.theme-switch {
  display: inline-block;
  height: 34px;
  position: relative;
  width: 60px;
}
.theme-switch input {
  display:none;
}
.slider {
  background-color: #ccc;
  bottom: 0;
  cursor: pointer;
  left: 0;
  position: absolute;
  right: 0;
  top: 0;
  transition: .4s;
}
.slider:before {
  background-color: #fff;
  bottom: 4px;
  content: "";
  height: 26px;
  left: 4px;
  position: absolute;
  transition: .4s;
  width: 26px;
}
input:checked + .slider {
  background-color: #66bb6a;
}
input:checked + .slider:before {
  transform: translateX(26px);
}
.slider.round {
  border-radius: 34px;
}
.slider.round:before {
  border-radius: 50%;
}
.main-content{
background-color: var(--bg-color);
    color: var(--heading-color);
}
.bruh {
  display: block;
  margin-left: 660px;
  margin-right: 860px;
  width: 236px;
  overflow: auto;
}


.input-group1 {
    width: 49%;
	float: left;
}

.input-group2 {
	width: 49%;
    float: right;
}
</style>
<body>
	<div class="row">
		<div class="col-sm-12">
			<div class="well">
				<img src="images/Connex1.png" class="bruh" title="Connex" width="2360px" height="80px">
				
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="main-content">
				<div class="header">
					<h3 style="text-align: center;"><strong>Join Social Media</strong></h3>
				</div>
				
				<div class="l-part">
					<form action="" method="post">
					
					
						
						<div class="input-group1">
						<input type="text" class="form-control" placeholder="First Name" name="first_name" required="required">
						</div>
						

						<div class="input-group2">
						
						<input type="text" class="form-control" placeholder="Last Name" name="last_name" required="required">
					</div><br><br><br>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input id="password" type="password" class="form-control" placeholder="Password" name="u_pass" required="required">
					</div><br>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input id="email" type="email" class="form-control" placeholder="Email" name="u_email" required="required">
					</div><br>
					<div class="input-group1">
						
						<select class="form-control" name="u_country" required="required">
							<option disabled>Select your Country</option>
							<option>Indonesia</option>
							<option>United States of America</option>
							<option>United Kingdom</option>
							<option>Japan</option>
							<option>Russia</option>
							<option>France</option>
							<option>Germany</option>
						</select>
					</div>
					<div class="input-group2">
						
						<select class="form-control input-md" name="u_gender" required="required">
							<option disabled>Select your Gender</option>
							<option>Male</option>
							<option>Female</option>
							<option>Others</option>
						</select>
						</div><br><br><br>
						<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-calendar
						"></i></span>
						<input type="date" class="form-control input-md" placeholder="Birthday" name="u_birthday" required="required">
						</div><br>
						<a style="text-decoration: none;float: right;color: #187FAB;" data-toggle="tooltip" title="Signin" href="signin.php">Already have an account?</a><br><br>
						<center><button id="signup" class="btn btn-info btn-lg" name="sign_up">
						Sign Up</button></center>
						<?php include("insert_user.php"); ?>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script>
const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
function switchTheme(e) {
    if (e.target.checked) {
        document.documentElement.setAttribute('data-theme', 'dark');
    }
    else {
        document.documentElement.setAttribute('data-theme', 'light');
    }    
}
toggleSwitch.addEventListener('change', switchTheme, false);
function switchTheme(e) {
    if (e.target.checked) {
        document.documentElement.setAttribute('data-theme', 'dark');
        localStorage.setItem('theme', 'dark'); //add this
    }
    else {
        document.documentElement.setAttribute('data-theme', 'light');
        localStorage.setItem('theme', 'light'); //add this
    }    
}
const currentTheme = localStorage.getItem('theme') ? localStorage.getItem('theme') : null;
if (currentTheme) {
    document.documentElement.setAttribute('data-theme', currentTheme);
    if (currentTheme === 'dark') {
        toggleSwitch.checked = true;
    }
}
</script>
</body>
</html>