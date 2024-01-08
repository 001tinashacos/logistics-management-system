<?php
    require_once '../Actions/DBMsconnect.php';
    session_start();
    ob_start();
        if(empty($_SESSION['user_id'])){
            header("location: ../Actions/LogOut.php");
        }

        require '../Actions/admin.php';
        require '../Actions/Data.php';
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
    <link rel="stylesheet" href="../style/style02.css">
</head>
<body>
    <div class="container">
        <div class="content"><br>
            <div class="come">
                <h1>HI <span><?php echo $admin_select['name']; ?>.</span></h1>
                <p>WELCOME <span><?php echo $admin_select['user_id']; ?></span></p><br><hr>
            </div><br>
            <div class="list">
                <a href="../Admin.php">
                    <img src="../node_modules/bootstrap-icons/icons/house-door-fill.svg" alt="">
                    <span>Dashboard</span>
                </a>
                <a href="Customers.php">
                    <img src="../node_modules/bootstrap-icons/icons/people-fill.svg" alt="">
                    <span>Customers</span>
                </a>
                <a href="Order.php">
                    <img src="../node_modules/bootstrap-icons/icons/handbag-fill.svg" alt="">
                    <span>Orders   </span>
                </a>
                <a href="verifying.php">
                    <img src="../node_modules/bootstrap-icons/icons/three-dots.svg" alt="">
                    <span>Verifying</span>
                </a>
                <a href="../Actions/LogOut.php">
                    <img src="../node_modules/bootstrap-icons/icons/arrow-return-left.svg" alt="">
                    <span>Logout</span>
                </a>
            </div>
        </div>
        <div class="details"><br><br>
            <div class="table">
                <h1>VERIFICATION.</h1><br><hr>
                <div class="customer">
                    <br>
                    <form action=""  method="post" enctype="multipart/form-data">
                        <table border1 class="">
                            <tr>
                                <th>PROFILE</th>
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>PHONE NO.</th>
                                <th>ACCEPT</th>
                                <th>CANCEL</th>
                            </tr><?php
                                while($resurt = mysqli_fetch_array($qry_return)){?>
                            <tr>
                                <input type="hidden" name="id" value="<?php echo $resurt['user_id']; ?>">
                                <input type="hidden" name="name" value="<?php echo $resurt['name']; ?>">
                                <input type="hidden" name="email" value="<?php echo $resurt['email']; ?>">
                                <input type="hidden" name="number" value="<?php echo $resurt['number']; ?>">
                                <input type="hidden" name="password" value="<?php echo $resurt['password']; ?>">
                                <input type="hidden" name="img" value="<?php echo $resurt['profile_img']; ?>">
                            </tr>
                            <tr>
                                <td> <img src="../Imagesv2/<?php echo $resurt['profile_img']; ?>" alt="" class="imgs"> </td>
                                <td><?php echo $resurt['name']; ?></td>
                                <td><?php echo $resurt['email']; ?></td>
                                <td><?php echo $resurt['number']; ?></td>
                                <td><input type="submit" name="accept" value="Accept" class="button_order"></td>
                                <td><input type="submit" name="cancel" value="Cancel" class="button2"></td>
                            </tr><?php
                                }
                                
                                if(isset($_POST['accept'])){
                                    $user_id = $_POST['id'];
                                    $name = $_POST['name'];
                                    $email = $_POST['email'];
                                    $number = $_POST['number'];
                                    $password = $_POST['password'];
                                    $img_new_name = $_POST['img'];

                                    $profile = "INSERT INTO verify VALUES('','$user_id','$name','$email','$number','$password','$img_new_name')";
                                    $query = mysqli_query($db,$profile);
                                        if($query){
                                            $sql = "DELETE FROM users WHERE user_id = '$_POST[id]'";
                                            $data = mysqli_query($db,$sql);

                                            $code_create = rand(time(),100); //generate a random code for drivers
                                            $code = "INSERT INTO code VALUES('','$_POST[id]','$code_create')";
                                            $cd = mysqli_query($db,$code);

                                            header("refresh: 0");
                                            ob_end_flush();
                                        }
                                }

                                if(isset($_POST['cancel'])){

                                    $sql = "DELETE FROM users WHERE user_id = '$_POST[id]'";
                                    $data = mysqli_query($db,$sql);
                                        if($data){
                                            header("refresh: 0");
                                            ob_end_flush();
                                        }
                                }
                                
                                ?>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>