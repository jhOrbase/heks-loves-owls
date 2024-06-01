<?php
include "../dbconnect.php";

session_start();

if(isset($_GET['pdt_id'])){
    
    $user_id = $_SESSION['users_info_id']; //user's account whose logged in
    $pdt_id = $_GET['pdt_id'];
    $pdt_qty = $_GET['cart_qty'];
    
    $sql_add_to_cart = "INSERT INTO `orders` 
                            (`user_id`, `pdt_id`, `pdt_qty`)
                        VALUES 
                            ('$user_id','$pdt_id','$pdt_qty')"; //changed order phase in database 
           
    $execute_cart_products = mysqli_query($conn, $sql_add_to_cart);
    
    if($execute_cart_products){
        header("location: index.php?page=cart&cart_status=product_{$pdt_id}_added_to_cart"); 
        //exit(); 
    }
}

