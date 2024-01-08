<?php
    //Start the session
    session_start();

    //Destroy session
    session_destroy();
    header("location: ../webpages/login.php");

?>