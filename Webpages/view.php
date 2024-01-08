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

    <!-- =============== style link ================== -->
    <link rel="stylesheet" href="../style/Style01.css">
    <link rel="stylesheet" href="../style/style02.css">
    <link rel="stylesheet" href="../style/MediaCode.css">
    <style>
    .t {
        border: none;
        font-size: 10px;
        text-align: center;
    }

    .tr {
        text-align: center;
    }
    </style>

</head>

<body>
    <div class="nav">
        <div class="nav-bar">
            <img src="../node_modules/bootstrap-icons/icons/list.svg" alt="list" onclick="sidebarOpen()" id="i">
            <span class="logo" id="navlogo"><a href="#">LOGISTICS MANAGEMENT SYSTEM</a></span>

            <div class="menu" id="menu">
                <div class="logo-toggle">
                    <span class="logo"><a href="#">LOGISTICS MANAGEMENT SYSTEM</a></span>
                    <img src="../node_modules/bootstrap-icons/icons/x.svg" alt="x" onclick="siderbarClose()">
                </div>
                <ul class="nav-links">
                    <li><a href="Verify.php">Home</a></li>
                    <li><a href="view.php">View Order</a></li>
                    <li><a href="../Actions/LogOut.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="viwes">
        <div class="item-list">
            <div class="list-details">
                <p>Logistic management is the process of planning, implementing, and controlling the movement of goods
                    between the point of origin to the point of consumption. It involves the integration of various
                    activities, including the transportation, inventory management, warehouse material handling,
                    packaging, and security. Most of the industries such as service industries face the problem of
                    distribution and transportation due to the expansion of these industries and network grows complex.
                    Another problem facing service companies is inventory management system planning to synchronize
                    between supplier or vendor, the delivery management system and the customers.
                </p>
                <br>
                <p>Hence, with this logistic management system, most of these problems are solved. This system was
                    mainly designed to target the logistic companies both big and small. This system work as actual
                    logistic department in any shipping company. It is very ideal as it cuts out the cost of hiring
                    different personals to take care of various logistic solutions and is also saves a lot of time. One
                    individual can login to the site as an Admin and control all the various logistics duties so long as
                    he/she has such privileges.
                </p>
            </div>
            <div class="intro">
                <div class="request" style="box-shadow: 0 0 10px black; background-color: whitesmoke;"><br>
                    <form action="" method="post" enctype="multipart/form-data">
                        <table border_1 class="t">
                            <p class="tr">THIS ARE YOUR ORDERS</p><br>
                            <tr>
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>ADDRESS</th>
                                <th>DISCRIPTIONS OF GOODS</th>
                                <th>FROM (SHIPPER)</th>
                                <th>TO (CONSINEE)</th>
                                <th>PHONE NO.</th>
                                <th>TRACKING CODE</th>
                                <th>ACCEPT</th>
                                <th>CANCEL</th>
                            </tr><?php
                                $make_resurts = "SELECT * FROM orders WHERE driver = '$_SESSION[user_id]'";
                                $qry_return = mysqli_query($db,$make_resurts);
                                $hover_onme01 = mysqli_num_rows($qry_return);
                                while($resurt = mysqli_fetch_array($qry_return)){?>
                            <tr>
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
                                <td><input type="submit" name="accept" value="Accept" class="button_order"></td>
                                <td><input type="submit" name="cancel" value="Cancel" class="button2"></td>
                            </tr><?php
                                }
                                
                                if(isset($_POST['accept'])){
                                    $name = $_POST['name'];
                                    $email = $_POST['email'];
                                    $address = $_POST['address'];
                                    $discript = $_POST['discript'];
                                    $fgoods = $_POST['fgoods'];
                                    $tgoods = $_POST['tgoods'];
                                    $number = $_POST['number'];
                                    $code = $_POST['code'];

                                    $profile = "INSERT INTO orders VALUES('','$name','$email','$address','$discript','$fgoods','$tgoods','$number','$code','$driver')";
                                    $query = mysqli_query($db,$profile);
                                        if($query){
                                            header("refresh: 0");
                                            ob_end_flush();
                                        }else{
                                            echo "<div class='information'>\"Function Error</div>\"";
                                        }
                                }

                                if(isset($_POST['cancel'])){

                                    $sql = "DELETE FROM orders WHERE driver = '$_SESSION[user_id]'";
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
    <script src="../style/script.js"></script>
</body>

</html>