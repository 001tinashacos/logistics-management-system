<?php
    require_once "DBMsconnect.php";

    $all_post = "SELECT * FROM shippment ";
    $combination = mysqli_query($db,$all_post);
        while($s = mysqli_fetch_array($combination)){
            $make_resurts = "SELECT * FROM shippment WHERE code = '$s[code]'";
            $qry_return = mysqli_query($db,$make_resurts);
            $GLOBALS['hover_onme01'] = mysqli_num_rows($qry_return);
        }
  
?>