<?php
    include 'atclass.php';

?>
<html>
    <body>
    <center><h3 style="color: #00ADEF;">PHARMACIN</h3></center>
    <hr/>
    <center><h4>Area Wise Vendor Report</h4></center>
    <?php
    echo "<b>Date : </b>". date('d-m-y');
    ?>
    
    <form method="get">
        <?php
        
        $sql = mysqli_query($connection, "select * from tbl_area") or die (mysqli_error($connection));
            echo "<br> <b>Select Area : </b><select name='sareaid' style='width:120px;'>";
            while ($row1 = mysqli_fetch_array($sql)) 
            {
               echo "<option value='{$row1['area_id']}'>{$row1['area_name']}</option>";  
            }
            echo "</select>";
        ?>
        <input type="submit" value="search">
    </form>
    
    <a href="#" onclick="window.print();">Print</a>
    <?php
    if(isset($_GET['sareaid']))
    {
        $sareaid = $_GET['sareaid'];
    $custq = mysqli_query($connection, "select * from tbl_vendor where area_id = {$sareaid}") or die(mysqli_error($connection));
    $count = mysqli_num_rows($custq);
    echo "<br/><b> $count Records Found</b>";
    echo "<br/><table border='1' style='width:100%;'>";
    
    echo "<tr style='background-color: #00ADEF'>";
    echo "<th>ID</th>";
    echo "<th>Name</th>";
    echo "<th>Mobile No</th>";
    echo "<th>Address</th>";
    echo "<th>Details</th>";
    echo "<th>Email</th>";
    echo "<th>Shop Name</th>";
    echo "<th>Shop Timing</th>";
    echo "<th>Shop Image</th>";
    echo "</tr>";
   
    while ($row = mysqli_fetch_array($custq))
    {
        echo "<tr>";
        echo "<td>{$row['vendor_id']}</td>";
        echo "<td>{$row['vendor_name']}</td>";
        echo "<td>{$row['vendor_mobileno']}</td>";
        echo "<td>{$row['vendor_address']}</td>";
         echo "<td>{$row['vendor_details']}</td>";
        echo "<td>{$row['vendor_email']}</td>";
         echo "<td>{$row['shop_name']}</td>";
         echo "<td>{$row['shop_timing']}</td>";
        echo "<td><img src='../upload/vendor-shop/{$row['shop_image']}' style='height:50px;width:50px;'></td>";
        echo "</tr>";
    } 
    }
    ?>
    </body>
</html>