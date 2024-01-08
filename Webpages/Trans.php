<?php
    include_once "../Actions/DBMsconnect.php";
    
    $select = "SELECT * FROM users WHERE user_id = '$_SESSION[user_id]'";
    $query = mysqli_query($db,$select);
        while($GLOBALS['name']  = mysqli_fetch_array($query)){
            //$GLOBALS['name'] = $re;
        }

?>