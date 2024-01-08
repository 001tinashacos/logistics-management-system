<?php
    require_once "DBMsconnect.php";

    $make_resurts = "SELECT * FROM users WHERE `status` = 'Driver'";
    $qry_return = mysqli_query($db,$make_resurts);
    $hover_onme02 = mysqli_num_rows($qry_return);
    //$num = mysqli_fetch_array($qr_admin,MYSQLI_ASSOC);
        
?>