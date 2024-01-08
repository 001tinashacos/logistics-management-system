<?php
    require_once "DBMsconnect.php";

    $make_resurts = "SELECT * FROM verify";
    $qry_return = mysqli_query($db,$make_resurts);
    $hover_onme02 = mysqli_num_rows($qry_return);
        
?>