<?php

session_start();

$con = mysqli_connect('localhost', 'root', '');

mysqli_select_db($con, 'courierdb');

if(isset($_POST['cusername'])){
    $cuname = $_POST['cuser'];
    $cpassw = $_POST['cpass'];

    $sql="select * from courier where Courier_username='".$cuname."' and Courier_pass='".$cpassw."' limit 1";

    $result=mysqli_query($con, $sql);

    $num=mysqli_num_rows($result);

    if($num == 1){
        echo "Username already taken";
    }else{
        $reg = "insert into courier(cuser, cpass) values ('$cuname', '$cpassw')";
        mysqli_query($con, $reg);
        echo "Registration successful";
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="regstyle.css">
        <title>Courier Registration</title>
    </head>

    <body>
        <div class="logo">
            <img src="logopms.png">
        </div>

        <div class="topnav">
            <p>REGISTER</p>
        </div>

        <div class="regcont">
            <div id="lregcont">
                <form action="login.php" method="POST">
                <fieldset>
                    <legend>Courier Information</legend>
                    <p>
                        <label>Courier ID</label>
                        <input type="text" id="cid" name="cid" placeholder="Enter NRIC in numeric">
                    </p>
                    <p>
                        <label>Full Name</label>
                        <input type="text" id="cfname" name="cfname" placeholder="Enter full name">
                    </p>
                    <p>
                        <label>Email Address</label>
                        <input type="text" id="cemail" name="cemail" placeholder="Enter email">
                    </p>
                    <p>
                        <label>Contact Number</label>
                        <input type="text" id="chp" name="chp" placeholder="Enter in numeric format">
                    </p>
                    <p>
                        <label>Area</label>
                        <input type="text" id="carea" name="carea" placeholder="Enter address area">
                    </p>
                    <p>
                        <label>Affiliation</label>
                        <input type="text" id="caff" name="caff" placeholder="Enter affiliation name">
                    </p>
                    <p>
                        <label>Choice of Transport</label>
                        <input type="radio" name="transport" value="1">Motorcycle
                        <input type="radio" name="transport" value="2">Car
                        <input type="radio" name="transport" value="3">Van
                        <input type="radio" name="transport" value="4">Others
                    </p>
                </fieldset>
                <fieldset>
                    <legend>Courier Account</legend>
                    <p>
                        <label>Create Username</label>
                        <input type="text" id="cusername" name="cuser" placeholder="Enter username">
                    </p>
                    <p>
                        <label> Create Password</label>
                        <input type="text" id="cpassword" name="cpass" placeholder="Enter Password">
                    </p>
                    <br>
                    <input id="submit" type="submit" value="Register">
                </fieldset>                
                </form>
            </div>

            <div id="rregcont">
                <img src="img4.jpg">
                <p>
                    Join our team and be a part of Malaysia's leading delivery service provider by signing up with us!
                </p>
                <input type="checkbox" id="cb" name="cb" require>
                <label>I agree that PMS can collect, use and disclose the information provided by me in accordance with your Privacy Policy which I have read and understood.</label>
                <p>
                <div id="maybefooter"><button onclick="window.location.href='login.php';">Back</button></div>
                </p>
            </div>
        </div>
    </body>
</html>