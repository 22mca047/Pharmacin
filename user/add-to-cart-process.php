<?php

session_start();

$proid = $_GET['pro_id'];

if (!isset($proid)) {
    // header("location:product-list.php");
}
$qty = $_GET['demo_vertical2'];
$price = $_GET['demo_vertical3'];
$vendordid = $_GET['vendorid'];

if (isset($_SESSION['productcart'])) {
    $currentNo = $_SESSION['counter'] + 1;
    $_SESSION['productcart'][$currentNo] = $proid;
    $_SESSION['qtycart'][$currentNo] = $qty;
    $_SESSION['qtypricecart'][$currentNo] = $price;
    $_SESSION['vendorid'][$currentNo] = $vendordid;
    $_SESSION['counter'] = $currentNo;
} else {
    $productcart = array();
    $qtycart = array();

    $_SESSION['productcart'][0] = $proid;
    $_SESSION['qtycart'][0] = $qty;
    $_SESSION['qtypricecart'][0] = $price;
    $_SESSION['vendorid'][0] = $vendordid;
    $_SESSION['counter'] = 0;
}

echo "<pre>";
print_r($_SESSION);

header("location:add-to-cart.php");
?>
