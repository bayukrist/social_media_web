<!DOCTYPE html>
<?php
session_start();
include("includes/header.php");

if(!isset($_SESSION['user_email'])){
	header("location: index.php");
}
?>
<html>
<style>
.well{
		background-color: var(--secondary-color);
    color: var(--heading-color);
	}
	:root {
    --primary-color: #302AE6;
    --secondary-color: #6666ff;
    --font-color: #424242;
    --bg-color: #fff;
    --heading-color: #292922;
}
[data-theme="dark"] {
    --primary-color: #9A97F3;
    --secondary-color: #818cab;
    --font-color: #e1e1ff;
    --bg-color: #161625;
    --heading-color: #818cab;
}
h1 {
    color: var(--secondary-color);
    /*styles tambahan*/
    .....
}
a {
    color: var(--primary-color);
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
.bruh {
  display: block;
  margin-left: 700px;
  margin-right: 860px;
  width: 80px;
  overflow: auto;
}
label {
  width:200px;
  display: inline-block;
}
</style>
<head>
	<?php
		$user = $_SESSION['user_email'];
		$get_user = "select * from users where user_email='$user'";
		$run_user = mysqli_query($con,$get_user);
		$row = mysqli_fetch_array($run_user);

		$user_name = $row['user_name'];
	?>
	<title><?php echo "$user_name"; ?></title>
	
	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="style/home_style2.css">
</head>
<body>
<div class="row">
	<div id="insert_post" class="col-sm-12">
		<center>
		<form action="home.php?id=<?php echo $user_id; ?>" method="post" id="f" enctype="multipart/form-data">
		<textarea class="form-control" id="content" rows="4" name="content" placeholder="What's in your mind?"></textarea><br>
		<label class="btn btn-warning" id="upload_image_button">Select Image
		<input type="file" name="upload_image" size="30">
		</label>
		<button id="btn-post" class="btn btn-success" name="sub">Post</button>
		</form>
		<?php insertPost(); ?>
		</center>
	</div>
</div>
<div class="row">
	<div class="col-sm-12">
		<center><h2><strong>News Feed</strong></h2><br></center>
    <?php 
      	global $con;
        $per_page = 4;
      
        if(isset($_GET['page'])){
          $page = $_GET['page'];
        }else{
          $page=1;
        }

        $start_from = ($page-1) * $per_page;
        $get_postss = "select * from posts where user_id='$user_id' ORDER by 1 DESC LIMIT $start_from, $per_page";
      
        $run_postss = mysqli_query($con, $get_postss);
      
        while($row_postss = mysqli_fetch_array($run_postss)){
      
          $post_id = $row_postss['post_id'];
          $user_id = $row_postss['user_id'];
          $content = substr($row_postss['post_content'], 0,40);
          $upload_image = $row_postss['upload_image'];
          $post_date = $row_postss['post_date'];
          $jumlah_like = $row_postss['post_like'];
      
          $user = "select * from users where user_id='$user_id' AND posts='yes'";
          $run_user = mysqli_query($con,$user);
          $row_user = mysqli_fetch_array($run_user);
      
          $user_name = $row_user['user_name'];
          $user_image = $row_user['user_image'];
      
      
          if($content=="No" && strlen($upload_image) >= 1){
            echo"
            <div class='row'>
              <div class='col-sm-3'>
              </div>
              <div id='posts' class='col-sm-6'>
                <div class='row'>
                  <div class='col-sm-2'>
                  <p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
                  </div>
                  <div class='col-sm-6'>
                    <h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
                    <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                  </div>
                  <div class='col-sm-4'>
                  </div>
                </div>
                <div class='row'>
                  <div class='col-sm-12'>
                    <img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
                  </div>
                </div><br>
                <a href='like_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Like $jumlah_like</button></a>
                <a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
              </div>
              <div class='col-sm-3'>
              </div>
            </div><br><br>
            ";
          }
      
          else if(strlen($content) >= 1 && strlen($upload_image) >= 1){
            echo"
            <div class='row'>
              <div class='col-sm-3'>
              </div>
              <div id='posts' class='col-sm-6'>
                <div class='row'>
                  <div class='col-sm-2'>
                  <p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
                  </div>
                  <div class='col-sm-6'>
                    <h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
                    <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                  </div>
                  <div class='col-sm-4'>
                  </div>
                </div>
                <div class='row'>
                  <div class='col-sm-12'>
                    <p>$content</p>
                    <img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
                  </div>
                </div><br>
                <a href='like_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Like $jumlah_like</button></a>
                <a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
              </div>
              <div class='col-sm-3'>
              </div>
            </div><br><br>
            ";
          }
      
          else{
            echo"
            <div class='row'>
              <div class='col-sm-3'>
              </div>
              <div id='posts' class='col-sm-6'>
                <div class='row'>
                  <div class='col-sm-2'>
                  <p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
                  </div>
                  <div class='col-sm-6'>
                    <h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
                    <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                  </div>
                  <div class='col-sm-4'>
                  </div>
                </div>
                <div class='row'>
                  <div class='col-sm-12'>
                    <h3><p>$content</p></h3>
                  </div>
                </div><br>
                <a href='like_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Like $jumlah_like</button></a>
                <a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
              </div>
              <div class='col-sm-3'>
              </div>
            </div><br><br>
            ";
          }
        }


        $get_friends ="select * from relation where froms='$user_id' AND status='F'";
        $run_friends = mysqli_query($con,$get_friends);
        while($row_friends=mysqli_fetch_array($run_friends)){
        $to = $row_friends['tos'];
        $get_posts = "select * from posts where user_id='$to' ORDER by 1 DESC LIMIT $start_from, $per_page";
      
        $run_posts = mysqli_query($con, $get_posts);
      
        while($row_posts = mysqli_fetch_array($run_posts)){
      
          $post_id = $row_posts['post_id'];
          $user_id = $row_posts['user_id'];
          $content = substr($row_posts['post_content'], 0,40);
          $upload_image = $row_posts['upload_image'];
          $post_date = $row_posts['post_date'];
          $jumlah_like = $row_posts['post_like'];
      
          $user = "select * from users where user_id='$user_id' AND posts='yes'";
          $run_user = mysqli_query($con,$user);
          $row_user = mysqli_fetch_array($run_user);
      
          $user_name = $row_user['user_name'];
          $user_image = $row_user['user_image'];
      
      
          if($content=="No" && strlen($upload_image) >= 1){
            echo"
            <div class='row'>
              <div class='col-sm-3'>
              </div>
              <div id='posts' class='col-sm-6'>
                <div class='row'>
                  <div class='col-sm-2'>
                  <p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
                  </div>
                  <div class='col-sm-6'>
                    <h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
                    <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                  </div>
                  <div class='col-sm-4'>
                  </div>
                </div>
                <div class='row'>
                  <div class='col-sm-12'>
                    <img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
                  </div>
                </div><br>
                <a href='like_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Like $jumlah_like</button></a>
                <a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
              </div>
              <div class='col-sm-3'>
              </div>
            </div><br><br>
            ";
          }
      
          else if(strlen($content) >= 1 && strlen($upload_image) >= 1){
            echo"
            <div class='row'>
              <div class='col-sm-3'>
              </div>
              <div id='posts' class='col-sm-6'>
                <div class='row'>
                  <div class='col-sm-2'>
                  <p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
                  </div>
                  <div class='col-sm-6'>
                    <h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
                    <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                  </div>
                  <div class='col-sm-4'>
                  </div>
                </div>
                <div class='row'>
                  <div class='col-sm-12'>
                    <p>$content</p>
                    <img id='posts-img' src='imagepost/$upload_image' style='height:350px;'>
                  </div>
                </div><br>
                <a href='like_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Like $jumlah_like</button></a>
                <a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
              </div>
              <div class='col-sm-3'>
              </div>
            </div><br><br>
            ";
          }
      
          else{
            echo"
            <div class='row'>
              <div class='col-sm-3'>
              </div>
              <div id='posts' class='col-sm-6'>
                <div class='row'>
                  <div class='col-sm-2'>
                  <p><img src='users/$user_image' class='img-circle' width='100px' height='100px'></p>
                  </div>
                  <div class='col-sm-6'>
                    <h3><a style='text-decoration:none; cursor:pointer;color #3897f0;' href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
                    <h4><small style='color:black;'>Updated a post on <strong>$post_date</strong></small></h4>
                  </div>
                  <div class='col-sm-4'>
                  </div>
                </div>
                <div class='row'>
                  <div class='col-sm-12'>
                    <h3><p>$content</p></h3>
                  </div>
                </div><br>
                <a href='like_post.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Like $jumlah_like</button></a>
                <a href='single.php?post_id=$post_id' style='float:right;'><button class='btn btn-info'>Comment</button></a><br>
              </div>
              <div class='col-sm-3'>
              </div>
            </div><br><br>
            ";
          }
        }
          
        }
      
        include("functions/pagination.php");
    ?>
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