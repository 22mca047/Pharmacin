<?php 
$id=$_GET["id"];
$user_amount=$_GET["price"];
$user_name = "Prince Shah";
$user_email = "prince@gmail.com";
$user_mobile = "9909901212";
$user_mobile = "9909901212";
$uid = rand(100000, 999999);
$uniqid = "DEMO-" . $uid;
$project_title = "Razor Pay Demo";
include 'razor-pay/pay.php';
?>