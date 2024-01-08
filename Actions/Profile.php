<?php
    require_once "DBMsconnect.php";
    $auto = $_SESSION['user_id'];
    
    $profile1 = "SELECT * FROM users WHERE user_id = '$auto'";
    $image = mysqli_query($db,$profile1);

    $profile = "SELECT * FROM verify WHERE user_id = '$auto'";
    $img = mysqli_query($db,$profile);
?>