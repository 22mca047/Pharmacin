<?php
include 'atclass.php';
?>
<html>
    <body>
    <center><h3 style="color: #00ADEF;">PHARMACIN</h3></center>
    <hr/>
    <center><h4>Area Wise Customer Report</h4></center>
    <?php
    echo "<b>Date : </b>" . date('d-m-y');
    ?>

    <form method="get">
        <?php
        $sql = mysqli_query($connection, "select * from tbl_area") or die(mysqli_error($connection));
        echo "<br> <b>Select Area : </b><select name='sareaid' style='width:120px;'>";
        while ($row1 = mysqli_fetch_array($sql)) {
            echo "<option value='{$row1['area_id']}'>{$row1['area_name']}</option>";
        }
        echo "</select>";
        ?>
        <input type="submit" value="search">
    </form>

    <a href="#" onclick="window.print();">Print</a>
<?php
if (isset($_GET['sareaid'])) {
    $sareaid = $_GET['sareaid'];
    $custq = mysqli_query($connection, "select * from tbl_customer where area_id = {$sareaid}") or die(mysqli_error($connection));
    $count = mysqli_num_rows($custq);
    echo "<br/><b> $count Records Found</b>";
    echo "<br/><table border='1' style='width:100%;'>";

    echo "<tr style='background-color: #00ADEF'>";
    echo "<th>ID</th>";
    echo "<th>Name</th>";
    echo "<th>Gender</th>";
    echo "<th>DOB</th>";
    echo "<th>Mobile No</th>";
    echo "<th>Address</th>";
    echo "<th>Email</th>";
    echo "<th>Image</th>";
    echo "</tr>";

    while ($row = mysqli_fetch_array($custq)) {
        echo "<tr>";
        echo "<td>{$row['customer_id']}</td>";
        echo "<td>{$row['customer_name']}</td>";
        echo "<td>{$row['customer_gender']}</td>";
        echo "<td>{$row['customer_dob']}</td>";
        echo "<td>{$row['customer_mobileno']}</td>";
        echo "<td>{$row['customer_address']}</td>";
        echo "<td>{$row['customer_email']}</td>";
        echo "<td><img src='../upload/customer/{$row['customer_image']}' style='height:50px;width:50px;'></td>";
        echo "</tr>";
    }
}
?>
</body>
</html>