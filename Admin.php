<?php
    require_once 'Actions/DBMsconnect.php';
    session_start();
        if(empty($_SESSION['user_id'])){
            header("location: Actions/LogOut.php");
        }

        require 'Actions/Admin.php';
        require 'Actions/Customers.php';
        require 'Actions/Orders.php';
        require 'Actions/Drives.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!---style--->
    <link rel="stylesheet" href="style/Style01.css">
</head>
<body>
    <div class="container">
        <div class="content"><br>
            <div class="come">
                <h1>HI <span><?php echo $admin_select['name']; ?>.</span></h1>
                <p>WELCOME <span><?php echo $admin_select['user_id']; ?></span></p><br><hr>
            </div><br>
            <div class="list">
                <a href="Admin.php">
                    <img src="node_modules/bootstrap-icons/icons/house-door-fill.svg" alt="">
                    <span>Dashboard</span>
                </a>
                <a href="webpages/Customers.php">
                    <img src="node_modules/bootstrap-icons/icons/people-fill.svg" alt="">
                    <span>Customers</span>
                </a>
                <a href="webpages/Order.php">
                    <img src="node_modules/bootstrap-icons/icons/handbag-fill.svg" alt="">
                    <span>Orders   </span>
                </a>
                <a href="webpages/verifying.php">
                    <img src="node_modules/bootstrap-icons/icons/three-dots.svg" alt="">
                    <span>Verifying</span>
                </a>
                <a href="Actions/LogOut.php">
                    <img src="node_modules/bootstrap-icons/icons/arrow-return-left.svg" alt="">
                    <span>Logout</span>
                </a>
            </div>
        </div>
        <div class="details"><br>
        <h1 class="ids">DASHBOARD CONTROL PANEL.</h1><br><br><hr>
            <div class="items">
                <!-- customer details -->
                <div class="customer">
                    <div class="count">
                        <h1><?php if(!empty($hover_onme)){
                            echo $hover_onme;
                        }else{
                            echo 00;
                        } ?></h1>
                    </div>
                    <div class="chats">
                        <p><span>TOTAL CUSTOMERS</span></p>
                        <img src="node_modules/bootstrap-icons/icons/people-fill.svg" alt="bag">
                    </div>
                </div>
                <!-- Orders details -->
                <div class="customer" id="order">
                    <div class="count">
                        <h1><?php if(!empty($hover_onme01)){
                            echo $hover_onme01;
                        }else{
                            echo 00;
                        } ?></h1>
                    </div>
                    <div class="chats">
                        <p><span>TOTAL ORDERS</span></p>
                        <img src="node_modules/bootstrap-icons/icons/handbag-fill.svg" alt="bag" class="bg">
                    </div>
                </div>
                <!-- Drivers details -->
                <div class="customer" id="driver">
                    <div class="count">
                        <h1><?php if(!empty($hover_onme02)){
                            echo $hover_onme02;
                        }else{
                            echo 00;
                        } ?></h1>
                    </div>
                    <div class="chats">
                        <p><span>TOTAL DRIVERS</span></p>
                        <img src="node_modules/bootstrap-icons/icons/people-fill.svg" alt="bag">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>