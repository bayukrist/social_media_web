<?php
include("includes/connection.php");
include("functions/functions.php");
?>
<style>
.container-fluid{
		
		background-color: #368CCB;
    color: #fff;

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
			<a href="home_admin.php">
			<img src="images/Connex.png" title="Connex" width="80px" height="80px"></img>
			</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	       	<li><a style="color: #000000; font-size: 15px; top: 10px;" href="home_admin.php">Home</a></li>
            <li><a style="color: #000000; font-size: 15px; top: 10px;" href='logout.php'>Logout</a></li>

			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<form class="navbar-form navbar-left" method="get" action="results_admin.php">
						<div class="form-group">
							<input type="text" class="form-control" name="user_query1" placeholder="Search">
						</div>
						<button type="submit" class="btn btn-info" name="search1">Search</button>
					</form>
				</li>
			</ul>
		</div>
	</div>
</nav>