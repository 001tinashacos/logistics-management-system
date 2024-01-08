<?php
    require_once '../Actions/DBMsconnect.php';
    session_start();
    ob_start();
        if(empty($_SESSION['user_id'])){
            header("location: ../Actions/LogOut.php");
        }

        //require '../Actions/Profile.php';
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
                    <li><a href="../Index.php">Home</a></li>
                    <li><a href="User_order.php">Driver</a></li>
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
                <div class="request"><br>
                    <p style="text-align: center; color:aliceblue;">DRIVER.</p>
                    <?php 
                        $order = "SELECT * FROM seen WHERE driver_id = '$_SESSION[user_id]'";
                        $query = mysqli_query($db,$order);
                            if(mysqli_num_rows($query)<1){
                                echo '<div class"information"> NO REQUEST YET</div>';
                            }
                            while($me = mysqli_fetch_array($query)){

                                $profile = "SELECT * FROM verify WHERE user_id = '$me[driver_id]'";
                                $img = mysqli_query($db,$profile);
                                    
                                    while($n = mysqli_fetch_array($img)){ ?>
                    <input type="text" readonlly class="updates" value="<?php echo $n['name']; ?>">
                    <input type="text" readonlly class="updates" value="<?php echo $n['email']; ?>">
                    <input type="text" readonlly class="updates" value="<?php echo $n['number']; ?>">
                    <?php
                                    }
                            }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <script src="../style/script.js"></script>
</body>

</html>