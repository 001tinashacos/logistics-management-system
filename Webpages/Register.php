<?php
    require_once '../Actions/DBMsconnect.php';
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
    <style>
        .field {
            background-color: #273e7e;
            border-radius: 5px;
            cursor: pointer;
            padding: 10px 20px;
        }
    </style>

</head>
<body>
    <div class="more-infor">
            <div class="sign"><br>
                <h2>REGISTRATION FORM.</h2>
                <form auto_complete="off" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                    <div class="form_group">
                        <input type="text" name="name" class="form_field" placeholder="Full Name">
                        <label for="name" class="form_label">Full Name</label>
                    </div>
                    <div class="form_group">
                        <input type="email" name="email" class="form_field" placeholder="Email">
                        <label for="email" class="form_label">Email</label>
                    </div>
                    <div class="form_group">
                        <input type="number" name="number" class="form_field" placeholder="Phone No">
                        <label for="number" class="form_label">Phone No</label>
                    </div>
                    <div class="form_group">
                        <input type="password" name="password" class="form_field" placeholder="Password">
                        <label for="password" class="form_label">Password</label>
                    </div>
                    <div class="form_group">
                        <input type="password" name="cpassword" class="form_field" placeholder="Confim Password">
                        <label for="password" class="form_label">Confim Password</label>
                    </div><br>
                    <div class="form_group">
                        <input type="file" name="image" id="file" class="field">
                    </div>
                    <br><br>
                    <input type="submit" name="next" value="VERIFY" class="button">
                    <br><br>
                        <p style="float: left;">Already have acount <a href="login.php" style="color: red;">Login</a></p>
                    <br>
                    <?php

                        if($_SERVER['REQUEST_METHOD'] == "POST"){
                            $user = "User";
                            $name = $_POST['name'];
                            $email = $_POST['email'];
                            $number = $_POST['number'];
                            $password = $_POST['password'];
                            $cpassword = $_POST['cpassword'];

                            //UPLOAD IMAGE
                            $img = $_FILES['image']['name'];
                            $imgt = $_FILES['image']['tmp_name'];
                            $img_explode = explode('.',$img);
                            $img_text = end($img_explode);

                            if(!empty($name && $email && $password && $img)){
                                $extensions = ['png','jpeg','jpg','PNG','JPEG','JPG'];
                                    if(in_array($img_text,$extensions) === true){// Upload image extention 
                                        $user_id = rand(time(),1000000);
                                        $time = time();
                                        //let move the user uploaded image to our particular folder
                                        $img_new_name = $time.$img;

                                            if(move_uploaded_file($imgt,"../Imagesv2/".$img_new_name)){//if user upload image move to our folder successfully
                                                $function=strlen($password);
                                                    if($password == $cpassword){
                                                        if($function<8){
                                                            echo "<div class='information'>Oops Your Password must contain 8 Characters</div>";
                                                        }else{
                                                            $profile = "INSERT INTO users VALUES('','$user_id','$name','$email','$number','$password','$img_new_name','$user')";
                                                            $query = mysqli_query($db,$profile);
                                                                if($query){
                                                                    header("location: login.php");
                                                                }
                                                            }
                                                        }else{
                                                            echo "<div class='information'>PASSWORD MUST MATCH</div>";
                                                        }
                                            }else{
                                                echo "<div class='information'>Cant Upload your file</div>";
                                            }
                                    }
                            }else{
                                echo "<div class='information'>Please... Required a field</div>";
                            }
                        }
                    ?>
                </form>
                <br><br>
            </div>
    </div>
</body>
</html>