<?php

$con = mysqli_connect("localhost", "root", "","courierdb");

if(isset($_POST['update'])){
$pid = $_GET['Parcel_ID'];

if($con === false){
    die("error connecting");
}

$sql = "update parcel set ParcelStatus='Delivered' where Parcel_ID='$pid'";

if(mysqli_query($con, $sql)){
    echo "Records were updated successfully.";
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
 
// Close connection
mysqli_close($con);
}

?>