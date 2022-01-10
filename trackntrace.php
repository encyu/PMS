<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="mainstyle.css">
        <title>Track and Trace</title>
    </head>

    <body>
        <div class="logo">
            <img src="logopms.png">
        </div>

        <div class="topnav">
            <p>PARCEL MANAGEMENT SYSTEM</p>
        </div>

        <div class="bodcont">
            <div id="cont1">
                <img src="img3.png">
                <h2>Track and Trace</h2>
                <p>Track your parcel status by entering your Customer ID in the box</p>
            </div>

            <form action="trackntrace.php" method="POST">
            <div id="cont2">
                <input type="text" name="cid" name="cid" placeholder="Enter your Customer ID">
                <input type="submit" name="track" value="Track Parcel">
            </div>
            </form>

            <div id="result">
            <?php

                $con = mysqli_connect("localhost", "root", "","courierdb");
                
                if(isset($_POST['cid'])){
                    $custid = $_POST['cid'];

                    $query = "select * from parcel where Customer_ID='$custid'";
                    $result = mysqli_query($con, $query);

                    if(mysqli_num_rows($result)>0){
                        foreach($result as $row){
                            ?>
                            <div>
                                <label>Customer ID</label>
                                <input type="text" value="<?= $row['Customer_ID']; ?>">
                            </div>
                            <div>
                                <label>Parcel ID</label>
                                <input type="text" value="<?= $row['Parcel_ID']; ?>">
                            </div>
                            <div>
                                <label>Delivery Status</label>
                                <input type="text" value="<?= $row['ParcelStatus']; ?>">
                            </div>
                            <div>
                                <label>Parcel Weight</label>
                                <input type="text" value="<?= $row['ParcelWeight']; ?>">
                            </div>
                            <div>
                                <label>Parcel Quantity</label>
                                <input type="text" value="<?= $row['ParcelQuantity']; ?>">
                            </div>
                            <div>
                                <label>Parcel Destination</label>
                                <input type="text" value="<?= $row['ParcelDestination']; ?>">
                            </div>
                            <?php
                        }
                    }else{
                        echo "No record found";
                    }
                }
                ?>
            </div>
        </div>
    </body>
</html>