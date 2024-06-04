<?php
include "../dbconnect.php";

session_start();


if(isset($_GET['c_set_order_status'])){

    $user_id = $_SESSION['users_info_id'];

    // Check if the cart is not empty
    $cart_empty = true;
    $sql_get_cart_products = "SELECT * FROM orders WHERE user_id = '$user_id' AND order_phase_status = '1'";
    $get_result = mysqli_query($conn, $sql_get_cart_products);
    if (mysqli_num_rows($get_result) > 0) {
        $cart_empty = false;
    }

    // If the cart is not empty, allow the user to proceed with the checkout
    if (!$cart_empty) {
        $sql_checkout = "UPDATE `orders`
                            SET `order_phase_status` = '2'
                        WHERE `user_id` = '$user_id'";
                        
        $execute_checkout = mysqli_query($conn, $sql_checkout);

        if($execute_checkout){
            header("location: index.php?msg=product_{$order_id}_checkout"); 
            exit(); 
        }
    }
    // If the cart is empty, display an error message
    else {
        header("location: index.php?page=cart&msg=2");
    }
}

?>