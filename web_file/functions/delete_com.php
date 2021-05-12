<?php
include("../includes/connection.php");

if(isset($_GET['com_id'])){
    global $con;

   

    $com_id = $_GET['com_id'];

    $get_post = "select * from comments where com_id='$com_id'";
    $run_user = mysqli_query($con,$get_post);
    $rows = mysqli_fetch_array($run_user);

    $post_id = $rows['post_id'];

    $delete_com = "delete from comments where com_id='$com_id'";

    $run_delete = mysqli_query($con, $delete_com);

    if($run_delete){
        echo"<script>alert('A comment have been deleted!')</script>";
        echo"<script>window.open('../single.php?post_id=$post_id', '_self')</script>";
    }
}
?>