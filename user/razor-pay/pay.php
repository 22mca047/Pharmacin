<?php
include ('header.php');
?>
<title>Razorpay Payment Gateway</title>
<?php // include('./container.php'); ?>
<div class="container">
    <div class="row">
        <!--	<h2>Example: Razorpay Payment Gateway Integration in PHP</h2>-->
        <br><br><br>
        <?php
        require ('config.php');
        require ('razor-pay/razorpay-php/Razorpay.php');

//session_start();
        use Razorpay\Api\Api;

$api = new Api($keyId, $keySecret);
        $orderData = [
            'receipt' => 3456,
            'amount' => $_SESSION['total_amount_data'] * 100,
            'currency' => "INR",
            'payment_capture' => 1
        ];
        $razorpayOrder = $api->order->create($orderData);
        $razorpayOrderId = $razorpayOrder['id'];
        $_SESSION['razorpay_order_id'] = $razorpayOrderId;
        $displayAmount = $amount = $orderData['amount'];
        if ($displayCurrency !== 'INR') {
            $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
            $exchange = json_decode(file_get_contents($url), true);

            $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
        }
        $data = [
            "key" => $keyId,
            "amount" => $amount,
            "name" => "Total Amount",
            "description" => $project_title,
            "image" => "",
            "prefill" => [
                "name" => $user_name,
                "contact" => $user_mobile,
            ],
            "notes" => [
                // "address"           => $customer_address,
                "merchant_order_id" => $uniqid,
            ],
            "theme" => [
                "color" => "#F37254"
            ],
            "order_id" => $razorpayOrderId,
        ];

        if ($displayCurrency !== 'INR') {
            $data['display_currency'] = $displayCurrency;
            $data['display_amount'] = $displayAmount;
        }

        $json = json_encode($data);

        require ("checkout/manual.php");
        ?>
    </div>
    <?php include ('footer.php'); ?>