<?php
session_start();
include_once "../dbconnect.php";

if(isset($_POST['o_payment_method'])){

    $user_id = $_SESSION['users_info_id'];
    $alt_address = $_POST['o_alt_address'];
    $payment_method = $_POST['o_payment_method'];
    $order_ref_no = $_POST['o_order_ref_no'];
    $shipping_id = $_POST['o_ship_option'];
    $total_amt_to_pay = $_POST['o_total_amt_to_pay'];
    
    //if payment method is gcash 
    if( $payment_method == "2" ){ 
    ?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../style/gcash.css">
</head>
<body style="background: #c3e6f4">

<form action="process_gcash.php" method="POST" class="payment">
           <!-- Total Amount to Pay: <b> <?php echo "Php " . number_format($total_amt_to_pay,2); ?> </b> <br>
           Please pay EXACT AMOUNT to this Gcash Account Number: 09672480993
           <br>Account Name: ADMIN --> 
           <hr>
                <input type="text" hidden name="o_total_amt_to_pay" value="<?php echo $total_amt_to_pay; ?>" />
                <input type="text" hidden name="o_payment_method" value="<?php echo $payment_method; ?>" />
                <input type="text" hidden name="o_order_ref_no" value="<?php echo $order_ref_no; ?>" />
                <input type="text" hidden name="o_alt_address" value="<?php echo $alt_address; ?>" />
                <input type="text" hidden name="o_shipping_id" value="<?php echo $shipping_id; ?>" />

        <!--gcash-->


    
    <body>
		<div class="panel panel-default credit-card-box">
			<div class="panel-heading display-table">
				<div class="row display-tr">
				    <h3 class="panel-title display-td"> Gcash Payment Details</h3> 
                </div>
                <h6 style = "font-size: 12px; padding: 5px 0 0 15px">Please pay EXACT AMOUNT to this Gcash<br> Account Number: 09672480993 <br> Account Name: ADMIN </h6>
                      
                    
			
			</div>
		</div>
		<br>
		<label for="cardNumber">Gcash Reference Number</label>
		<input type="text" class="form-control" name="o_gcash_ref_no" placeholder="Reference Number" required autofocus />
		<span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
		<label for="cardExpir">Gcash Account Sender Name</label>
		<input type="text" class="form-control" name="o_gcash_acc_name" placeholder="Sender Name" required />
		<label for="cardCVC">Gcash Account Number</label>
		<input type="text" class="form-control" name="o_gcash_acc_no" placeholder="Account Number" required />
		<label for="couponCode">Gcash Amount Sent</label>
		<input type="text" class="form-control" name="o_gcash_amt_sent" />
		<br>
            <div style="margin-left:30px; font-size: 18px; ">
                Total Amount to Pay: <br><strong><?php echo "Php " . number_format($total_amt_to_pay,2); ?><strong>
            </div>
		<button class="blueButton" style="float:right;" type="submit">Confirm Payment</button>
		<br><br>
        
    </form>


    <?php 
    die();                            
    }    
        
    $sql_update_order = "UPDATE orders
                            SET order_phase_status = 2
                              , payment_method = '$payment_method'
                              , order_ref_no = '$order_ref_no'
                              , alternate_address = '$alt_address'
                              , shipping_id = '$shipping_id'
                          WHERE user_id = '$user_id' 
                            AND order_phase_status = '1';";
                    
    $execute_update_order = mysqli_query($conn, $sql_update_order);
    
    if($execute_update_order == 1){
        header("location: index.php?page=cart&msg=1");
    }
    else{
        header("location: index.php?page=cart&msg=2");
    }
}
?>
<script src="../js/bootstrap.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
</body>
</html>