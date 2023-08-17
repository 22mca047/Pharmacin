


<!-- <button id="rzp-button1" class="btn btn-primary">Pay with Razorpay</button>
<a href="online-pay.php"  class="btn btn-primary">Back</a> -->

<script>
    $(document).ready(function () {
        $("#rzp-button1").trigger("click");
    });
</script>
<button id="rzp-button1" style="display:none;"  class="btn btn-primary">Pay with Razorpay</button>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<form name='razorpayform' action="verify.php" method="POST">
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
    <input type="hidden" name="razorpay_signature"  id="razorpay_signature" >
    

    
</form>
<script>
var options = <?php echo $json?>;
options.handler = function (response){
    document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
    document.getElementById('razorpay_signature').value = response.razorpay_signature;
    document.razorpayform.submit();
};
options.theme.image_padding = false;
options.modal = {
    ondismiss: function() {
        console.log("This code runs when the popup is closed");
        <?php
        // $query= mysqli_query($connection,"UPDATE `tbl_user_purchase_course` SET payment_status='Cancelled' WHERE `user_purchase_course_id`='{$_SESSION["orderid"]}'")or die(mysqli_error($connection));             
        
        //  unset($_SESSION['membership_package_last_insert_id']);
        ?>
        
        window.location.href="index.php";
        
    },
    escape: true,
    backdropclose: false
};
var rzp = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e){
    rzp.open();
    e.preventDefault();
}
</script>