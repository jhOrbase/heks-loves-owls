<?php 
        if(isset($_GET['cancel_order'])){
                include_once "../dbconnect.php";
                $ord_no = $_GET['confirm_order'];
                
                $sql_update_order="UPDATE `orders`
                                SET `order_phase_status` = '0'
                                WHERE `order_ref_no` = '$ord_no';";
                $sql_execute = mysqli_query($conn, $sql_update_order);
        
                if($sql_execute){
                header("location: index.php?manageorder&orderphase0&status=successful");   
        }         
        }
        if(isset($_GET['confirm_order'])){
        include_once "../dbconnect.php";
                $ord_no = $_GET['confirm_order'];
                
                $sql_update_order="UPDATE `orders`
                                        SET `order_phase_status` = '3'
                                WHERE `order_ref_no` = '$ord_no';";
                $sql_execute = mysqli_query($conn, $sql_update_order);
        
                if($sql_execute){
                header("location: index.php?manageorder&orderphase3&status=successful");   
        }   
        }
        if(isset($_GET['ship_order'])){
        include_once "../dbconnect.php";
                $ord_no = $_GET['ship_order'];
                
                $sql_update_order="UPDATE `orders`
                                SET `order_phase_status` = '4'
                                WHERE `order_ref_no` = '$ord_no';";
                $sql_execute = mysqli_query($conn, $sql_update_order);
        
                if($sql_execute){
                header("location: index.php?manageorder&orderphase4&status=successful");   
        } 
        }
        if(isset($_GET['complete_order'])){
                include_once "../dbconnect.php";
                $ord_no = $_GET['complete_order'];
                
                $sql_update_order="UPDATE `orders`
                                SET `order_phase_status` = '5'
                                WHERE `order_ref_no` = '$ord_no';";
                $sql_execute = mysqli_query($conn, $sql_update_order);
        
                if($sql_execute){
                header("location: index.php?manageorder&orderphase5&status=successful");   
        }        
        }
?>

