<?php
    require_once '../Actions/DBMsconnect.php';
    session_start();
    ob_start();
        if(empty($_SESSION['user_id'])){
            header("location: ../Actions/LogOut.php");
        }
        //require_once 'Trans.php';
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
                    <span class="logo"><a href="#">online</a></span>
                    <img src="../node_modules/bootstrap-icons/icons/x.svg" alt="x" onclick="siderbarClose()">
                </div>
                <ul class="nav-links">
                    <li><a href="../Index.php">Home</a></li>
                    <li><a href="Transport.php">Transport</a></li>
                    <li><a href="Register.php">Customer Register</a></li>
                    <li><a href="Driver.php">Driver Register</a></li>
                    <li><a href="Login.php">LogIn</a></li>
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
                    <p style="text-align: center; color:aliceblue;">SHIPPMENT INFORMATION.</p>
                    <form action="" method="post" class="form-proces">
                        <?php $select = "SELECT * FROM users WHERE user_id = '$_SESSION[user_id]'";
                                $query = mysqli_query($db,$select);
                                    while($name  = mysqli_fetch_array($query)){?>

                        <table class="table">
                            <tr>
                                <td>Full Name:</td>
                                <td><input type="text" name="name" readonly value="<?php echo $name['name']; ?>"></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><input type="email" name="email" readonly value="<?php echo $name['email']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Address:</td>
                                <td><input type="text" name="address"></td>
                            </tr>
                            <tr>
                                <td>Description of Goods:</td>
                                <td><input type="text" name="goods"></td>
                            </tr>
                            <tr>
                                <td>From:</td>
                                <td><input type="text" name="from"></td>
                            </tr>
                            <tr>
                                <td>To:</td>
                                <td><input type="text" name="to"></td>
                            </tr>
                            <tr>
                                <td>Phone No.</td>
                                <td><input type="text" name="number" readonly value="<?php echo $name['number']; ?>">
                                </td>
                            </tr>
                            <tr>
                                <td>Tracking Code:</td>
                                <td><input type="text" name="code"></td>
                            </tr>
                            <tr>
                                <td><input type="submit" name="submit" value="Submit" class="button"></td>
                            </tr>
                        </table><?php }
                            if(isset($_POST['submit'])){
                                if(!empty($_POST['name'] && $_POST['email'] && $_POST['address'] && $_POST['goods'] && $_POST['from'] && $_POST['to'] && $_POST['number'] && $_POST['code'])){
                                    $table = "INSERT INTO shippment VALUES('','$_POST[name]','$_POST[email]','$_POST[address]','$_POST[goods]','$_POST[from]','$_POST[to]','$_POST[number]','$_POST[code]')";
                                    $query = mysqli_query($db,$table);
                                        if($query){
                                            //header("refresh: 0");
                                            echo "<div class='information'>THANK YOU FOR CHOOSING US.</div>";
                                        }else{
                                            echo "<div class='information'>SOMETING WENT WRONG. PLEASE TRY AGAIN LATER</div>";
                                        }
                                }else{
                                    echo "<div class='information'>SOMETING WENT WRONG. PLEASE REQUIRED A FIELD</div>";
                                }
                            }
                    ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../style/script.js"></script>
</body>

</html>