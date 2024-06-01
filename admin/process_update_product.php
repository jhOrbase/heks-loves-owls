<?php
if(isset($_POST['u_pdt_name'])){
    include_once "../dbconnect.php";
    
    $pdt_id = $_POST['u_pdt_id'];
    $pdt_name = $_POST['u_pdt_name']; 
    $pdt_description = $_POST['u_pdt_description'];
    $pdt_price = $_POST['u_pdt_price'];
    
    $sql_update_product_info = "UPDATE `products`
                                   SET `pdt_name`='$pdt_name'
                                        , `pdt_description`='$pdt_description'
                                        , `pdt_price`='$pdt_price'
                                WHERE pdt_id ='$pdt_id'";
                                
    if(mysqli_query($conn, $sql_update_product_info)) {
        //header("../admin/index.php?manageitems&update_status=1");
        header("location: ../admin/index.php?manageproducts&update_status=1");
    }
}