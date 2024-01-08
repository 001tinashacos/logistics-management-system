<?php
    require_once "DBMsconnect.php";

    $make_resurts = "SELECT * FROM users WHERE `status` = 'User'";
    $qry_return = mysqli_query($db,$make_resurts);
    $hover_onme = mysqli_num_rows($qry_return);
        
    
?>