<?php
include("includes/connection.php");
include("functions/functions.php");
?>

<style>
navbar-brand{
	color: var(--heading-color);
	
}
.container-fluid{
		
		background-color: #368CCB;
    color: #fff;

	}
:root {
    --primary-color: #302AE6;
    --secondary-color: #6666ff;
	--tertiary-color: #000000;
    --font-color: #000000;
    --bg-color: #008900;
    --heading-color: #368CCB;
}
[data-theme="dark"] {
    --primary-color: #9A97F3;
    --secondary-color: #818cab;
	--tertiary-color: #ffffff;
    --font-color: #e1e1ff;
    --bg-color: #368CCB;
    --heading-color: #818cab;
}
h1 {
    color: var(--secondary-color);
    /*styles tambahan*/
    .....
}
.a {
    color: var(--heading-color);
    /*styles tambahan*/
    .....
}
	.theme-switch-wrapper {
  display: flex;
  align-items: center;
  em {
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
</style>
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-target="#bs-example-navbar-collapse-1" data-toggle="collapse" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			<a href="home.php">
			<img src="images/Connex.png" title="Connex" width="80px" height="80px"></img>
			</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	      	
	      	<?php 
			$user = $_SESSION['user_email'];
			$get_user = "select * from users where user_email='$user'"; 
			$run_user = mysqli_query($con,$get_user);
			$row=mysqli_fetch_array($run_user);
					
			$user_id = $row['user_id']; 
			$user_name = $row['user_name'];
			$first_name = $row['f_name'];
			$last_name = $row['l_name'];
			$describe_user = $row['describe_user'];
			$Relationship_status = $row['Relationship'];
			$user_pass = $row['user_pass'];
			$user_email = $row['user_email'];
			$user_country = $row['user_country'];
			$user_gender = $row['user_gender'];
			$user_birthday = $row['user_birthday'];
			$user_image = $row['user_image'];
			$user_cover = $row['user_cover'];
			$recovery_account = $row['recovery_account'];
			$register_date = $row['user_reg_date'];
					
			global $con;
			$user_posts = "select * from posts where user_id='$user_id'"; 
			$run_posts = mysqli_query($con,$user_posts); 
			$posts = mysqli_num_rows($run_posts);
			?>

	        <li><a style="color: #000000; font-size: 25px; top: 10px;" href='profile.php?<?php echo "u_id=$user_id" ?>'><?php echo "$first_name"; ?></a></li>
	       	<li><a style="color: #000000; font-size: 25px; top: 10px;" href="home.php?<?php echo "u_id=$user_id" ?>">Home</a></li>
			<li><a style="color: #000000; font-size: 25px; top: 10px;" href="members.php">Find People</a></li>
			<li><a style="color: #000000; font-size: 25px; top: 10px;" href="friends.php?<?php echo "u_id=$user_id" ?>">Friends</a></li>
			<li><a style="color: #000000; font-size: 25px; top: 10px;" href="messages.php?u_id=new">Messages</a></li>


					<?php
						echo"

						<li class='dropdown'>
							<a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'><span><i class='glyphicon glyphicon-chevron-down'></i></span></a>
							<ul class='dropdown-menu'>
								<li>
									<a href='my_post.php?u_id=$user_id'>My Posts <span class='badge badge-secondary'>$posts</span></a>
								</li>
								<li>
									<a href='edit_profile.php?u_id=$user_id'>Edit Account</a>
								</li>
								<li role='separator' class='divider'></li>
								<li>
									<a href='logout.php'>Logout</a>
								</li>
							</ul>
						</li>
						";
					?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<form class="navbar-form navbar-left" method="get" action="results.php">
						<div class="form-group">
							<input type="text" class="form-control" name="user_query" placeholder="Search">
						</div>
						<button type="submit" class="btn btn-info" name="search">Search</button>
					</form>
					
				</li>
			</ul>
		</div>
	</div>
</nav>