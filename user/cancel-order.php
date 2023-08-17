<?php

session_start();
require './class/atclass.php';
$odid = $_GET['odid'];
$query = mysqli_query($connection, "update tbl_orderdetails set status='Cancel' where details_id='{$odid}'") or die(mysqli_error($connection));

if ($query)
{
        echo "<script>alert('You Cancel The Order');window.location='user-order.php';</script>";
}
?>