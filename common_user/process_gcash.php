<?php
include_once "../dbconnect.php";
session_start();

if(isset($_POST['o_order_ref_no'])){

    $user_id = $_SESSION['users_info_id'];

    $ord_ref_no = $_POST['o_order_ref_no'];
    $alt_address = $_POST['o_alt_address'];
    $shipping_id = $_POST['o_shipping_id'];
    $payment_method = $_POST['o_payment_method'];

    $gcash_ref_no = $_POST['o_gcash_ref_no'];
    $gcash_acc_name = $_POST['o_gcash_acc_name'];
    $gcash_acc_no = $_POST['o_gcash_acc_no'];
    $gcash_amt_sent = $_POST['o_gcash_amt_sent'];    
    $total_amt_to_pay = $_POST['o_total_amt_to_pay'];
    
    if($total_amt_to_pay > $gcash_amt_sent){
        header("location: index.php?page=cart&msg=Amount is Insufficient.");
        die();
    }
        
    $sql_gcash_update_order = "UPDATE orders
                            SET order_phase_status = 2
                              , order_ref_no = '$ord_ref_no'
                              , payment_method = '$payment_method'
                              , alternate_address = '$alt_address'
                              , shipping_id = '$shipping_id'
                              , gcash_ref_no = '$gcash_ref_no'
                              , gcash_account_name = '$gcash_acc_name'
                              , gcash_account_no = '$gcash_acc_no'
                              , gcash_amount_sent = '$gcash_amt_sent'
                          WHERE user_id = '$user_id' 
                            AND order_phase_status = '1';";

    $execute_gcash_update_order = mysqli_query($conn, $sql_gcash_update_order);
    
    if($execute_gcash_update_order == 2){
        header("location: index.php?page=cart&msg=1");
    }
    else{
        header("location: index.php?page=cart&msg=2");
    }
}