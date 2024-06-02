<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
    
<?php
include_once "../dbconnect.php";
session_start();

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
      <div class="card p-2">
       <h3 class="display-3">Input Gcash Payment Details</h3>
        <form action="process_gcash.php" method="POST">
           
           
           Total Amount to Pay: <b> <?php echo "Php " . number_format($total_amt_to_pay,2); ?> </b> <br>
           Please pay EXACT AMOUNT to this Gcash Account Number: 09672480993
           <br>Account Name: ADMIN
           <hr>
                <input type="text" hidden name="o_total_amt_to_pay" value="<?php echo $total_amt_to_pay; ?>" />
                <input type="text" hidden name="o_payment_method" value="<?php echo $payment_method; ?>" />
                <input type="text" hidden name="o_order_ref_no" value="<?php echo $order_ref_no; ?>" />
                <input type="text" hidden name="o_alt_address" value="<?php echo $alt_address; ?>" />
                <input type="text" hidden name="o_shipping_id" value="<?php echo $shipping_id; ?>" />

        <!--gcash-->
            <div class="mb-3">
                <label for="" class="form-label">Gcash Reference Number</label>
                <input type="text" class="form-control" name="o_gcash_ref_no">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Gcash Account Sender Name</label>
                <input type="text" class="form-control" name="o_gcash_acc_name">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Gcash Account Number</labe>
                <input type="text" class="form-control" name="o_gcash_acc_no">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Gcash Amount Sent</label>
                <input type="text" class="form-control" name="o_gcash_amt_sent">
            </div>
            <input type="submit" value="Save" class="btn btn-primary">
        </form>
        </div>
    <?php 
    die();                            
    }    
        
    $sql_update_order = "UPDATE `orders`
                            SET `order_phase_status` = 2
                              , `payment_method` = '$payment_method'
                              , `order_ref_no` = '$order_ref_no'
                              , `alternate_address` = '$alt_address'
                              , `shipping_id` = '$shipping_id'
                          WHERE `user_id` = '$user_id' 
                            AND `order_phase_status` = '1';";
                    
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
</body>
</html>
