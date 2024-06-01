<?php
include "../dbconnect.php";

session_start();


if(isset($_GET['c_set_order_status'])){

    $user_id = $_SESSION['users_info_id'];

    $sql_checkout = "UPDATE `orders`
                        SET `order_phase_status` = '2'
                    WHERE `user_id` = '$user_id'";
                    
    $execute_checkout = mysqli_query($conn, $sql_checkout);
        
    if($execute_checkout){
        header("location: index.php?msg=product_{$order_id}_checkout"); 
        exit(); 
    }
}

?>
