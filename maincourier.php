<?php

session_start();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="mainstyle.css">
        <title>Courier Dashboard</title>
    </head>

    <body>

        <div class="logo">
            <img src="logopms.png">
        </div>

        <div class="topnav">
            <p>PARCEL MANAGEMENT SYSTEM</p>
            <button onclick="window.location.href='logout.php';">Logout</button>
        </div>

        <div class="bodycont">

            <div class="leftcont">
                <div id="subcont">
                    <div id="boxa">
                    <img src="img1.png" class="imgcenter">
                    <p class="txtcenter">Welcome Back, <?php echo $_SESSION['cname']; ?> !</p>
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
                <h2>View All Parcels</h2>
                <form method="POST">
                <!--<div id="searchcont">
                    <input type="text" placeholder="Search Parcel ID...">
                    <input type="submit" name="search" value="search">
                </div>-->

                <div>
                    <table class="tstyle">
                        <thead>
                            <tr>
                            <th>Delivery Status</th>
                            <th>Parcel ID</th>
                            <th>Cust ID</th>
                            <th>Location</th>
                            <th>Parcel Weight</th>
                            <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <?php
                                $con = mysqli_connect("localhost", "root", "","courierdb");
                                $sql = "select * from parcel";
                                $result = mysqli_query($con, $sql);
                                $resultcheck = mysqli_num_rows($result);

                                if($resultcheck > 0){
                                    while($row = mysqli_fetch_assoc($result)){ ?>
                                    <tr>
                                        <td><?php echo $row['ParcelStatus'];?></td>
                                        <td><?php echo $row['Parcel_ID'];?></td>
                                        <td><?php echo $row['Customer_ID'];?></td>
                                        <td><?php echo $row['ParcelDestination'];?></td>
                                        <td><?php echo $row['ParcelWeight'];?></td>
                                        <?php echo "<td><a href=\"view-parcel.php?Parcel_ID=$row[Parcel_ID]\">View</a> | <a href=\"update.php?id=$row[Parcel_ID]\" onClick=\"return confirm('Are you sure you want to update parcel?')\">Update</a></td>";?>
                                    </tr>
                                    <?php }
                                }else{
                                    echo "No parcels to deliver, come again next time!";
                                }?>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </form>
            </div>
        </div>
    </body>
</html>

