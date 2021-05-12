<?php
session_start();
include("includes/header.php");

if(!isset($_SESSION['user_email'])){
    header("location: index.php");
}
?>

<html>
    <head>
        <title>Edit Post</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="style/home_style2.css">
    </head>
    <body> 
        <div class="row">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-6">
                <?php
                    if(isset($_GET['post_id'])){
                        $get_id = $_GET['post_id'];

                        $get_post = "select * from posts where post_id='$get_id'";
                        $run_post = mysqli_query($con, $get_post);
                        $row = mysqli_fetch_array($run_post);
						$jumlah_like =  $row['post_like'];
						$cek_like = $row['like_check'];

                        $post_con = $row['post_content'];
						
						$content = $jumlah_like + 1;
						$tambah_like_check = 1;

                        $update_post = "update posts set post_like='$content' where post_id='$get_id'"; 
						$update_like_check = "update posts set like_check='$tambah_like_check' where post_id='$get_id'"; 
						
						if($cek_like == "0")
						{
							$run_update = mysqli_query($con,$update_post);
							$run_update_like_check = mysqli_query($con,$update_like_check);
							if($run_update)
							{
								echo "<script>alert('Liked !')</script>";
								echo "<script>window.open('home.php', '_self')</script>";
							}
						}
						else
						{
								echo "<script>alert('Can't like twice !')</script>";
								echo "<script>window.open('home.php', '_self')</script>";
						}
                    }
                ?>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </body>
</html>
