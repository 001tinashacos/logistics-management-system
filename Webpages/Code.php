<?php
    require_once '../Actions/DBMsconnect.php';
    session_start();
    if(empty($_SESSION['user_id'])){
        header("location:  ../Actions/LogOut.php");
    }

    require "../Actions/Code_request.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <!---style--->
    <link rel="stylesheet" href="../style/Style01.css">

</head>
<body>
    <div class="more-infor">
            <div class="sign"><br>
                <h2>VERIFY CODE.</h2><br>
                <p><?php 
                        if(!empty($num['code'])){
                            echo "Use ".$num['code']." as a Code";
                        } 
                    ?></p>
                <form auto_complete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                    <div class="form_group">
                        <input type="text" name="code" class="form_field" placeholder="code" required>
                        <label for="text" class="form_label">Code</label>
                    </div>
                    <br><br>
                    <input type="submit" name="next" value="Sign Up" class="button">
                    <br><br>
                        <p style="float: left;"><a href="login.php" style="color: red;">Login</a></p>
                    <br>
                    <?php

                        if($_SERVER['REQUEST_METHOD'] == "POST") {
                            $email = $_POST['code'];
                            
                                $data_select = "SELECT * FROM code WHERE user_id = '$_SESSION[user_id]'";
                                $query_select = mysqli_query($db,$data_select);
                                $num_row = mysqli_num_rows($query_select);
                                $num = mysqli_fetch_array($query_select,MYSQLI_ASSOC);
                                    if($num_row == 1){
                                        
                                        header("location: verify.php");
                                    }else{
                                        echo "<div class='information'>Email or Password is not correct: </div>";
                                    }

                                
                                    
                                
                        }

                    ?>
                </form>
                <br><br>
            </div>
    </div>
</body>
</html>