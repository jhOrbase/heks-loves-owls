<?php

    include "../dbconnect.php";

    session_start();

    if(isset($_GET['delete_from_cart'])){
        $order_id = $_GET['delete_from_cart'];
    
        $sql_delete_from_cart = "DELETE FROM orders 
                                        WHERE order_id = '$order_id' 
                                        AND order_phase_status = '1';";
        $sql_execute = mysqli_query($conn, $sql_delete_from_cart);
        if($sql_execute){
            header("location: index.php?page=cart&msg=Cart item removed.");
        }
    }


?>