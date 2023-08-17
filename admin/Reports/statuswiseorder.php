<?php
include 'atclass.php';
?>
<html>
    <body>
    <center><h3 style="color: #00ADEF;">PHARMACIN</h3></center>
    <hr/>
    <center><h4>Status Wise Order Report</h4></center>
    <?php
    echo "<b>Date : </b>" . date('d-m-y');
    ?>

    <form method="post" enctype="multipart/form-data">
        <b>Select status : </b><select name='ostatus' style='width:120px;'>
            <option value="Pending" >Pending</option>
            <option value="Accept" >Accept</option>
            <option value="Cancel" >Cancel</option>
            <option value="Completed" >Completed</option>
        </select>
        <input type="submit" name="btn" value="search" style="width:80px;">
    </form>

    <a href="#" onclick="window.print();">Print</a>
    <?php
    if (isset($_POST['btn'])) {
        $ostatus = mysqli_real_escape_string($connection, $_POST['ostatus']);
        $sql = "SELECT
    `tbl_orderdetails`.`details_id`
    , `tbl_ordermaster`.`shipping_name`
    , `tbl_ordermaster`.`shipping_mobileno`
    , `tbl_ordermaster`.`shipping_address`
    , `tbl_orderdetails`.`pro_price`
    , `tbl_orderdetails`.`pro_qty`
    , `tbl_orderdetails`.`status`
    , `tbl_vendor`.`vendor_name`
    , `tbl_product`.`pro_name`
FROM
    `tbl_ordermaster`
    INNER JOIN `tbl_orderdetails` 
        ON (`tbl_ordermaster`.`order_id` = `tbl_orderdetails`.`order_id`)
    INNER JOIN `tbl_product_vendor` 
        ON (`tbl_product_vendor`.`pro_ven_id` = `tbl_orderdetails`.`pro_ven_id`)
    INNER JOIN `tbl_vendor` 
        ON (`tbl_product_vendor`.`vendor_id` = `tbl_vendor`.`vendor_id`)
    INNER JOIN `tbl_product` 
        ON (`tbl_product`.`pro_id` = `tbl_product_vendor`.`pro_id`) where `tbl_orderdetails`.`status` = '$ostatus'";
        $orderq = mysqli_query($connection, $sql) or die(mysqli_error($connection));
        $count = mysqli_num_rows($orderq);
        echo "<br/><b>$count Records Found</b><br>";
        echo "<br/><table border='1' style='width:100%;'>";

        echo "<tr style='background-color: #00ADEF'>";
        echo "<th>Details ID</th>";
        echo "<th>Shipping Name</th>";
        echo "<th>Shipping MobileNo</th>";
        echo "<th>Shipping Address</th>";
        echo "<th>Product Price</th>";
        echo "<th>Product Qty</th>";
        echo "<th>Status</th>";
        echo "<th>Vendor Name</th>";
        echo "<th>Product Name</th>";
        echo "</tr>";

        while ($row = mysqli_fetch_array($orderq)) {
            echo "<tr>";
            echo "<td>{$row['details_id']}</td>";
            echo "<td>{$row['shipping_name']}</td>";
            echo "<td>{$row['shipping_mobileno']}</td>";
            echo "<td>{$row['shipping_address']}</td>";
            echo "<td>{$row['pro_price']}</td>";
            echo "<td>{$row['pro_qty']}</td>";
            echo "<td>{$row['status']}</td>";
            echo "<td>{$row['vendor_name']}</td>";
            echo "<td>{$row['pro_name']}</td>";
            echo "</tr>";
        }
    }
    ?>
</body>
</html>

