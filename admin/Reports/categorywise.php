<?php
    include 'atclass.php';

?>
<html>
    <body>
    <center><h3 style="color: #00ADEF;">PHARMACIN</h3></center>
    <hr/>
    <center><h4>Category Wise Product Report</h4></center>
    <?php
    echo "<b>Date : </b>". date('d-m-y');
    ?>
    
    <form method="get">
        <?php
        
        $sql = mysqli_query($connection, "select * from tbl_category") or die (mysqli_error($connection));
            echo "<b>Select Category : </b><select name='scatid' style='width:120px;'>";
            while ($row1 = mysqli_fetch_array($sql)) 
            {
               echo "<option value='{$row1['category_id']}'>{$row1['category_name']}</option>";  
            }
            echo "</select>";
        ?>
        &nbsp;&nbsp;&nbsp;<b>Price1 : </b><input type="number" name="p1">&nbsp;
        <b> Price2 : </b><input type="number" name="p2">
        <input type="submit" value="search" style="width:80px;">
    </form>
    
    <a href="#" onclick="window.print();">Print</a>
    <?php
    if(isset($_GET['scatid']))
    {
        $scatid = $_GET['scatid'];
        $p1 = $_GET['p1'];
        $p2 = $_GET['p2'];
    $productq = mysqli_query($connection, "select * from tbl_product where category_id = {$scatid}  and pro_price between $p1 and $p2") or die(mysqli_error($connection));
    $count = mysqli_num_rows($productq);
    echo "<br/><b>$count Records Found</b><br>";
    echo "<br/><table border='1' style='width:100%;' >";
    
    echo "<tr style='background-color: #00ADEF'>";
    echo "<th>ID</th>";
    echo "<th>Name</th>";
    echo "<th>Price</th>";
    echo "<th>Details</th>";
    echo "<th>Image</th>";
    echo "</tr>";
   
    while ($row = mysqli_fetch_array($productq))
    {
        echo "<tr>";
        echo "<td>{$row['pro_id']}</td>";
        echo "<td style='width:290px;'>{$row['pro_name']}</td>";
        echo "<td>{$row['pro_price']}</td>";
        echo "<td>{$row['pro_details']}</td>";
        echo "<td><img src='../upload/product/{$row['pro_image']}' style='height:50px;width:50px;'></td>";
        echo "</tr>";
    } 
    }
    ?>
    </body>
</html>