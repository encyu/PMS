<?php

session_start();

$con = mysqli_connect('localhost', 'root', '');

mysqli_select_db($con, 'courierdb');

if(isset($_POST['cusername'])){
    $cuname = $_POST['cusername'];
    $cpassw = $_POST['cpassword'];

    $sql="select * from courier where Courier_username='".$cuname."' and Courier_pass='".$cpassw."' limit 1";

    $result=mysqli_query($con, $sql);

    if(mysqli_num_rows($result)==1){
        $_SESSION['cname'] = $cuname;
        header('location: maincourier.php');
    }else{
        echo "<script>alert('You have entered an invalid username or password!');</script>";
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="loginstyle.css">
        <title>Courier Login</title>
    </head>

    <body>
        <div class="cont">
            <div id="logocont">
                <img src="logopms.png">
            </div>

            <div id="formcont">
                <form method="post" action="#">
                    <fieldset>
                        <legend>Courier Login</legend>
                        <p>
                        <label>Username</label>
                        <br>
                        <input type="text" id="cusername" name="cusername" placeholder="Enter username">
                        </p>
                        <p>
                        <label>Password</label>
                        <br>
                        <input type="password" id="cpassword" name="cpassword" placeholder="Enter password">
                        </p>
                        <p>
                            <a href="#">Forgot Password?</a>
                        </p>
                        <input type="submit" value="Login">
                    </fieldset>
                </form>
                    
            </div>

            <div id="bottomcont">
                <p>Or sign up as a first time user!</p>
                <button onclick="window.location.href='register.php';">Sign Up</button>
            </div>
        </div>
    </body>
</html>