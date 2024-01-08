<?php
    require_once '../Actions/DBMsconnect.php';
    session_start();
    ob_start();
        if(empty($_SESSION['user_id'])){
            header("location: ../Actions/LogOut.php");
        }

        require '../Actions/Profile.php';
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
                    <li><a href="Profile.php">Profile</a></li>
                    <li><a href="view.php">View Order</a></li>
                    <li><a href="../Actions/LogOut.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="viwes">
        <div class="item-list">
            <div class="list-details">
                <div class="profile"><?php
                    if($image){
                        while($profile_picture = mysqli_fetch_array($image)){
                        if(empty($profile_picture['profile_img'])){
                            echo    '<img src="../node_modules/bootstrap-icons/icons/person-circle.svg" alt="image" class="profile-image">';
                        }else{
                            echo    '<img src="../Imagesv2/'.$profile_picture['profile_img'].'" alt="Profile" class="profile-image">';
                        } 
                            echo    '<p class="post">'.$profile_picture['name'].'</p>';
                        }
                    }else if($img){
                        while($profile_picture = mysqli_fetch_array($img)){
                            if(empty($profile_picture['profile_img'])){
                                echo    '<img src="../node_modules/bootstrap-icons/icons/person-circle.svg" alt="image" class="profile-image">';
                            }else{
                                echo    '<img src="../Imagesv2/'.$profile_picture['profile_img'].'" alt="Profile" class="profile-image">';
                            } 
                                echo    '<p class="post">'.$profile_picture['name'].'</p>';
                        }
                    }?>
                </div>
            </div>
            <div class="intro">
                <div class="request"><br>
                    <p style="text-align: center; color:aliceblue;">PROFILE UPDATE.</p>
                    <form action="" method="post" enctype="multipart/form-data">
                        <table class="updates">
                            <tr>
                                <td>Profile Picture</td>
                                <td class="fl"><input type="file" name="image"></td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td><input type="text" name="name"></td>
                            </tr>
                            <tr>
                                <td><button class="button" name="submit" style="background-color: blue;">Update</button>
                                </td>
                            </tr>
                        </table><?php
                        if($_SERVER['REQUEST_METHOD'] == "POST"){
                            $name = $_POST['name'];

                            //UPLOAD IMAGE
                            $img = $_FILES['image']['name'];
                            $imgt = $_FILES['image']['tmp_name'];
                            $img_explode = explode('.',$img);
                            $img_text = end($img_explode);

                            $extensions = ['png','jpeg','jpg','PNG','JPEG','JPG'];
                            if(!empty($img)){
                                if(in_array($img_text,$extensions) === true){// Upload image extention 
                                    $time = time();

                                    //let move the user uploaded image to our particular folder
                                    $img_new_name = $time.$img;

                                        if(move_uploaded_file($imgt,"../Imagesv2/".$img_new_name)){//if user upload image move to our folder successfully
                                            $upd = "UPDATE users SET profile_img = '$img_new_name' WHERE user_id = '$_SESSION[user_id]'";
                                            $sa = mysqli_query($db,$upd);
                                                if($sa){
                                                    header("refresh: 0");
                                                    ob_end_flush();
                                                }

                                            $profile = "UPDATE verify SET profile_img = '$img_new_name' WHERE user_id = '$_SESSION[user_id]'";
                                            $image = mysqli_query($db,$profile);
                                                if($image){
                                                    header("refresh: 0");
                                                    ob_end_flush();
                                                }
                                                    
                                        }else{
                                            echo "<div class='information'>Cant Upload your file</div>";
                                        }
                                }

                            }elseif(!empty($name)){
                                $update = "UPDATE verify SET `name` = '$name' WHERE user_id = '$_SESSION[user_id]'";
                                $sa = mysqli_query($db,$update);
                                    if($sa){
                                        header("refresh: 0");
                                        ob_end_flush();
                                    }
                                $profile = "UPDATE users SET `name` = '$name' WHERE user_id = '$_SESSION[user_id]'";
                                $image = mysqli_query($db,$profile);
                                    if($image){
                                        header("refresh: 0");
                                        ob_end_flush();
                                    }

                            }else{
                                echo "<div class='information'>RIQUIRED A FIELD THEN SEND</div>";
                            }
                        }?>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../style/script.js"></script>
</body>

</html>