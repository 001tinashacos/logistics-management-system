<?php
    require_once "DBMsconnect.php";

    $follow_table = "SELECT user_id FROM verify";
    $query_check = mysqli_query($db,$follow_table); 
    //$num01 = mysqli_fetch_array($query_check,MYSQLI_ASSOC);
    
    while($num01 = mysqli_fetch_array($query_check)){
        $make_resurts = "SELECT * FROM code WHERE user_id = '$num01[user_id]'";
        $qry_return = mysqli_query($db,$make_resurts);
        $hover_onme02 = mysqli_num_rows($qry_return);
        $num = mysqli_fetch_array($qry_return,MYSQLI_ASSOC);
    }

?>