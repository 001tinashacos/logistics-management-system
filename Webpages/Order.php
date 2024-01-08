<?php
    require_once '../Actions/DBMsconnect.php';
    session_start();
    ob_start();
        if(empty($_SESSION['user_id'])){
            header("location: ../Actions/LogOut.php");
        }

        require '../Actions/admin.php';
        //require '../Actions/Orders.php';
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
    <style>
        .g {
            font-size: 14px;
        }
        .select {
            padding: 10px 10px;
            border-radius: 8px;
        }
    </style>
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
                    <span>Orders</span>
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
                <h1>TOTAL ORDERS.</h1><br><hr>
                <div class="customer">
                    <br>
                    <form action="" method="post">
                        <table border_1 class="g">
                            <tr>
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>ADDRESS</th>
                                <th>DISCRIPTIONS OF GOODS</th>
                                <th>FROM (SHIPPER)</th>
                                <th>TO (CONSINEE)</th>
                                <th>PHONE NO.</th>
                                <th>TRACKING CODE</th>
                                <th>DRIVER</th>
                                <th>CONFIM</th>
                                <th>CANCEL</th>
                            </tr><?php
                                $make_resurts = "SELECT * FROM shippment ";
                                $qry_return = mysqli_query($db,$make_resurts);
                                while($resurt = mysqli_fetch_array($qry_return)){ ?>
                                    
                                <tr>
                                    <input type="hidden" name="id" value="<?php echo $resurt['id']; ?>">
                                    <input type="hidden" name="name" value="<?php echo $resurt['name']; ?>">
                                    <input type="hidden" name="email" value="<?php echo $resurt['email']; ?>">
                                    <input type="hidden" name="address" value="<?php echo $resurt['address']; ?>">
                                    <input type="hidden" name="discript" value="<?php echo $resurt['d_o_g']; ?>">
                                    <input type="hidden" name="fgoods" value="<?php echo $resurt['from_goods']; ?>">
                                    <input type="hidden" name="tgoods" value="<?php echo $resurt['to_goods']; ?>">
                                    <input type="hidden" name="number" value="<?php echo $resurt['number']; ?>">
                                    <input type="hidden" name="code" value="<?php echo $resurt['code']; ?>">
                                </tr>
                            <tr>
                                <td><?php echo $resurt['name']; ?></td>
                                <td><?php echo $resurt['email']; ?></td>
                                <td><?php echo $resurt['address']; ?></td>
                                <td><?php echo $resurt['d_o_g']; ?></td>
                                <td><?php echo $resurt['from_goods']; ?></td>
                                <td><?php echo $resurt['to_goods']; ?></td>
                                <td><?php echo $resurt['number']; ?></td>
                                <td><?php echo $resurt['code']; ?></td>

                                <td><select name="driver" class="select">
                                    <option disable selection>Driver</option><?php
                                        $follow_table = "SELECT * FROM verify order by rand() limit 10";
                                        $query_check = mysqli_query($db,$follow_table);
                                        while($dr = mysqli_fetch_array($query_check)){?>
                                        <option value="<?php echo $dr['user_id']; ?>"><?php echo $dr['name']; ?></option>
                                        <?php } ?>
                                </select></td>
                                <td><?php
                                        $select = "SELECT * FROM orders WHERE code = '$resurt[code]'";
                                        $qry = mysqli_query($db,$select);
                                        if(mysqli_num_rows($qry)<1){
                                            echo '<input type="submit" name="confim" value="Confim" class="button_order">';
                                        }else{
                                            echo '<input type="submit" name="confim" value="Check" readonly class="button_order">';
                                        }?>
                                    
                                </td>
                                <td><input type="submit" name="cancel" value="Cancel" class="button2"></td>
                            </tr><?php

                            
                                    
                                }
                                
                                // send order to drivers
                                if(isset($_POST['confim'])){
                                    $arrayName = array($_POST['id']);
                                    if($desc = $arrayName[0]){
                                        $GLOBALS['idd'] = $desc++;
                                    }
                                    
                                    $name = $_POST['name'];
                                    $email = $_POST['email'];
                                    $address = $_POST['address'];
                                    $discript = $_POST['discript'];
                                    $fgoods = $_POST['fgoods'];
                                    $tgoods = $_POST['tgoods'];
                                    $number = $_POST['number'];
                                    $code = $_POST['code'];
                                    $driver = $_POST['driver'];

                                    $profile = "INSERT INTO orders VALUES('','$name','$email','$address','$discript','$fgoods','$tgoods','$number','$code','$driver')";
                                    $query = mysqli_query($db,$profile);
                                        if($query){
                                            header("refresh: 0");
                                            ob_end_flush();
                                        }else{
                                            echo "<div class='information'>\"Function Error</div>\"";
                                        }
                                        
                                    $profile = "INSERT INTO seen VALUES('','$discript','$code','$driver')";
                                    $query = mysqli_query($db,$profile);
                                }

                                // delete a confimed order
                                if(isset($_POST['cancel'])){
                                    $code = $_POST['code'];

                                    $sql = "DELETE FROM shippment WHERE code = '$code]'";
                                    $data = mysqli_query($db,$sql);
                                        if($data){
                                            header("refresh: 0");
                                            ob_end_flush();
                                        }else{
                                            echo "<div class='information'>Function Error</div>";
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