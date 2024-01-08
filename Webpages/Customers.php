<?php
    require_once '../Actions/DBMsconnect.php';
    session_start();
        if(empty($_SESSION['user_id'])){
            header("location: ../Actions/LogOut.php");
        }

        require '../Actions/admin.php';
        require '../Actions/Customers.php';
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
    <div class="container">
        <div class="content"><br>
            <div class="come">
                <h1>HI <span><?php echo $admin_select['name']; ?>.</span></h1>
                <p>WELCOME <span><?php echo $admin_select['user_id']; ?></span></p><br>
                <hr>
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
                    <span>Orders </span>
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
                <h1>TOTAL CUSTOMERS.</h1><br>
                <hr>
                <div class="customer">
                    <br>
                    <table border_1 class="">
                        <tr>
                            <th>PROFILE</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>PHONE NO.</th>
                        </tr><?php
                            while($resurt = mysqli_fetch_array($qry_return)){?>
                        <tr>
                            <td> <img src="../Imagesv2/<?php echo $resurt['profile_img']; ?>" alt="" class="imgs"> </td>
                            <td><?php echo $resurt['name'];; ?></td>
                            <td><?php echo $resurt['email']; ?></td>
                            <td><?php echo $resurt['number']; ?></td>
                        </tr><?php
                            }?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>