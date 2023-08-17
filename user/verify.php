<?php
session_start();

require('razor-pay/config.php');
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Meta tags -->
        <meta charset="UTF-8">
        <meta name="description" content="">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Title  -->
        <title>Payment Process</title>



    </head>

    <body>



        <h3>Payment Process</h3>

        <?php
        require('razor-pay/razorpay-php/Razorpay.php');

        use Razorpay\Api\Api;
        use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

        $error = "Payment Failed";

        if (empty($_POST['razorpay_payment_id']) === false) {
            $api = new Api($keyId, $keySecret);

            try {
                // Please note that the razorpay order ID must
                // come from a trusted source (session here, but
                // could be database or something else)
                $attributes = array(
                    'razorpay_order_id' => $_SESSION['razorpay_order_id'],
                    'razorpay_payment_id' => $_POST['razorpay_payment_id'],
                    'razorpay_signature' => $_POST['razorpay_signature']
                );

                $api->utility->verifyPaymentSignature($attributes);
            } catch (SignatureVerificationError $e) {
                $success = false;
                $error = 'Razorpay Error : ' . $e->getMessage();
            }
        }

        if ($success === true) {
            $html = "<p>Your payment was successful</p>
             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
            unset($_SESSION['productcart']);
            unset($_SESSION['qtypricecart']);
            unset($_SESSION['qtycart']);
            unset($_SESSION['counter']);
            echo "<script>alert('Your Order Will Be Accepted Soon');window.location='home.php'</script>";
        } else {


            $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
        }
        echo $html;
        ?>

        <a href="home.php">Back To Home</a>
        <?php
        unset($_SESSION['razorpay_order_id']);
        ?>        

    </body>


</html>