<?php
    require_once "DBMsconnect.php";
    $user_id = $_SESSION['user_id'];

    $data_select = "SELECT * FROM `admin` WHERE user_id = '$user_id'";
    $query_select = mysqli_query($db,$data_select);
    $admin_select = mysqli_fetch_array($query_select);
            
?>