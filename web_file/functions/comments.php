<?php
    $user = $_SESSION['user_email'];
    $get_user = "select * from users where user_email='$user'";
    $run_user = mysqli_query($con,$get_user);
    $rows = mysqli_fetch_array($run_user);

    $user_now = $rows['user_name'];
    
    $get_id = $_GET['post_id'];

    $get_com = "select * from comments where post_id='$get_id' ORDER by 1 DESC";

    $run_com = mysqli_query($con,$get_com);

    while($row = mysqli_fetch_array($run_com)){
        $com = $row['comment'];
        $com_name = $row['comment_author'];
        $date = $row['date'];
        $com_id = $row['com_id'];

        echo "
            <div class='row'>
                <div class='col-md-6 col-md-offset-3'>
                    <div class='panel panel-info'>
                        <div class='panel-body'>
                            <div>
                                <h4><strong>$com_name</strong><i> commented </i> on $date </h4>
                                <p class='text-primary' style='margin-left:5px; font-size:20px;'>$com</p>
                                ";
                                if($com_name == $user_now){
                                    echo"<a href='functions/delete_com.php?com_id=$com_id' style='float:right;'><button class='btn btn-danger'>Delete</button></a>";
                                }
                            echo"</div>
                        </div>
                    </div>  
                </div>
            </div>
             ";
    }
?>