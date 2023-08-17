<?php

session_start();
require './class/atclass.php';
$oid = $_GET['oid'];
$details_id = $_GET['details_id'];
$status = $_GET['status'];
$query = mysqli_query($connection, "update tbl_orderdetails set status='{$status}' where details_id='{$details_id}'") or die(mysqli_error($connection));
if ($query) {
    if($status == 'Accept'){
        echo "<script>alert('Order Accepted ');window.location='order-details.php?oid=$oid';</script>";
    }
    elseif($status == 'Completed'){
        echo "<script>alert('Order Completed ');window.location='order-details.php?oid=$oid';</script>";
    }
    else
    {
        echo "<script>alert('Order Rejected');window.location='order-details.php?oid=$oid';</script>";
    }
    
}
?>