<?php

session_start();
require './class/atclass.php';
$project_title = "Pharmacin";
$user_name = "{$_GET['user_name']}";
$user_mobile = $_GET['user_mobile'];
$uniqid = $_GET['orderid'];
include 'razor-pay/pay.php';