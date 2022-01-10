<?php

$con = mysqli_connect("localhost", "root", "","courierdb");
$pid = $_GET['Parcel_ID'];
$sql = "select * from parcel where Parcel_ID = '$pid'";
$result = mysqli_query($con, $sql);
$resultcheck = mysqli_num_rows($result);

if($resultcheck > 0){
    while($row = mysqli_fetch_array($result)){
        $pid = $row['Parcel_ID'];
        $custid = $row['Customer_ID'];
        $pstatus = $row['ParcelStatus'];
        $pdelivery = $row['ParcelDestination'];
        $pweight = $row['ParcelWeight'];
        $pqty = $row['ParcelQuantity'];
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="mainstyle.css">
        <title>View Parcel</title>
    </head>

    <body>
        <div class="logo">
            <img src="logopms.png">
        </div>

        <div class="topnav">
            <p>PARCEL MANAGEMENT SYSTEM</p>
            <button onclick="window.location.href='logout.php';">Logout</button>
        </div>

        <div class="leftcont">
            <div id="subcont">
                <div id="boxa">
                <img src="img1.png" class="imgcenter">
                <p class="txtcenter">Welcome Back, [username]!</p>
                </div>

                <div id="box">
                <p>TOTAL DELIVERED</p>
                <h2>01</h2>
                </div>

                <div id="box">
                <p>PENDING DELIVERY</p>
                <h2>04</h2>
                </div>
            </div>
        </div>

        <div class="rightcont">
            <h2>View Parcel Details</h2>
            <div id="parcelcont">
                <img src="img5.jpg">

                <form>
                <fieldset>
                    <legend>Parcel Information</legend>
                    <p>
                        <label>Parcel ID</label>
                        <input type="text" value="<?php echo $pid; ?>">
                    </p>
                    <p>
                        <label>Status</label>
                        <input type="text" value="<?php echo $pstatus; ?>">
                    </p>
                    <p>
                        <label>Delivery Area</label>
                        <input type="text" value="<?php echo $pdelivery; ?>">
                    </p>
                    <p>
                        <label>Parcel Weight</label>
                        <input type="text" value="<?php echo $pweight; ?>">
                    </p>
                </fieldset>
                <fieldset>
                    <legend>Customer Info</legend>
                    <p>
                        <label>Customer ID</label>
                        <input type="text" value="<?php echo $custid; ?>">
                    </p>
                    <p>
                        <label>Parcel Quantity</label>
                        <input type="text" value="<?php echo $pqty; ?>">
                    </p>
                    <p>
                    </p>
                </fieldset>
                </form>
            </div>
            <?php 
            }else{
                echo "No parcels found";
            }?>
            <button onclick="window.location.href='maincourier.php';">Back</button>
        </div>
    </body>
</html>