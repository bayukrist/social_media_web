<?php
    error_reporting(-1);
    ini_set('display_errors',1);

    $configdb= array();
    $configdb['db']= "social_network";
    $configdb['host']= "localhost";
    $configdb['user']= "root";
    $configdb['pass']= "";

    $con = mysqli_connect($configdb['host'],$configdb['user'],$configdb['pass'],$configdb['db']);
    if(mysqli_connect_errno()){
        die("Failed connect db : " .mysqli_connect_error());
    }
?>