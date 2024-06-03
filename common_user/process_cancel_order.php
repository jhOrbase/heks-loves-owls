<?php
include_once "../dbconnect.php";

if(isset($_GET['cancel_full_order'])){
    $order_ref_no = $_GET['cancel_full_order'];

    $sql_cancel_order_from_checkout = "UPDATE `orders`
                                            SET `order_phase_status` = '0'
                                        WHERE `order_ref_no` = '$order_ref_no';";

    $sql_execute_cancel =  mysqli_query($conn,$sql_cancel_order_from_checkout);
        
    if($sql_execute_cancel){
        header("location: index.php?page=myorder&msg=product_{$order_ref_no}_cancel"); 
        exit(); 
    }
}
?>