<?php
    require_once '../Actions/DBMsconnect.php';
    session_start();
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
                <h2>LOGIN FORM.</h2><br><br><br>
                <form auto_complete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                
                    <div class="form_group">
                        <input type="email" name="email" class="form_field" placeholder="Email" required>
                        <label for="email" class="form_label">Email</label>
                    </div>
                    <div class="form_group">
                        <input type="password" name="password" class="form_field" placeholder="Password" required>
                        <label for="password" class="form_label">Password</label>
                    </div>
                    <br><br>
                    <input type="submit" name="next" value="Sign Up" class="button">
                    <br><br>
                        <span style="float: left;">Dont have Account (User): <a href="Register.php" style="color: red;">Sign Up</a></span>
                        <br><br>
                        <span>Sign Up as a Driver: <a href="Driver.php" style="color: blue;">Driver</a></span>
                    <br>
                    <?php

                        if($_SERVER['REQUEST_METHOD'] == "POST") {
                            $email = $_POST['email'];
                            $password = $_POST['password'];
                            
                                $data_select = "SELECT * FROM users WHERE email = '$email' AND `password` = '$password' ";
                                $query_select = mysqli_query($db,$data_select);
                                $num_row = mysqli_num_rows($query_select);

                                $tb_admin = "SELECT * FROM `admin` WHERE email = '$email' AND `password` = '$password'";
                                $qr_admin = mysqli_query($db,$tb_admin);
                                $num = mysqli_fetch_array($qr_admin,MYSQLI_ASSOC);
                                $qry = mysqli_num_rows($qr_admin);

                                $cypher = "SELECT * FROM verify WHERE email = '$email' AND `password` = '$password'";
                                $opo = mysqli_query($db,$cypher);
                                $cycropentane = mysqli_fetch_array($opo,MYSQLI_ASSOC);
                                $oops = mysqli_num_rows($opo);

                                    if($num_row == 1){
                                        $user = mysqli_fetch_assoc($query_select);
                                            if($user['status'] == "Driver"){ // check the driver if its already verifyed
                                                $cypher = "SELECT * FROM verify WHERE `user_id` = '$user[user_id]'";
                                                $opo = mysqli_query($db,$cypher);
                                                
                                                    if(mysqli_num_rows($opo)<1){
                                                        $d = $user['user_id'];
                                                        $_SESSION['user_id'] = $d;
                                                        header("location: Code.php");
                                                    }
                                            }else{
                                                $user_id = $user['user_id'];
                                                $_SESSION['user_id'] = $user_id;
                                                header("location: ../Index.php");
                                            }
                                    }elseif($qry == 1){

                                        $_SESSION['user_id'] = $num['user_id'];
                                        header("location: ../admin.php");

                                    }elseif($oops == 1){
                                        $d = $cycropentane['user_id'];
                                        $_SESSION['user_id'] = $d;
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