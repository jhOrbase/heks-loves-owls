<?php
include "../dbconnect.php";
session_start();
    $c_user_id = $_SESSION ['users_info_id']; //holds user id parameter for all processing

    if($_SESSION['users_user_type'] != 'C'){
        header("location: ../index.php");
        exit;
    }
    if(isset($_GET['logout'])){
        session_destroy();
        header("location: ../login.php");
        die();
    }
    if (!isset($_GET['page'])) {
        header("location: index.php?page=home");
        exit;
    }
    include_once "../top_border.php"; 
?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../style/homepage.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Wristique Watches - Homepage</title>  
</head>
<body>   
     
    <?php if(isset($_GET['page'])){
                if($_GET['page'] == 'home'){ ?>

    <?php include_once "../additional_header.php"; ?>

        <!--===============Display Products=================-->

   <div class="container-fluid">
        <div class="row">
        <?php                                
               $sql_get_products_hp = "SELECT * FROM `products` 
                                            WHERE `pdt_status`='A' 
                                                order by pdt_id ASC";

               $get_result_hp = mysqli_query($conn, $sql_get_products_hp); ?>
             
                   <?php
                       while ( $row = mysqli_fetch_assoc($get_result_hp) ){ 
                    ?>
                               <div class="col-3 p-0">
                                   <div class="card">
                                       <img src="../webpics/<?php echo $row['pdt_img'];?>" width="100px" class="card-img">
                                       <div class="card-body">
                                           <h3 class="card-title">
                                               <?php echo $row['pdt_name'];?>
                                           </h3>
                                           <p class="card-text"><?php echo $row['pdt_description'];?></p>
                                             <blockquote class="blockquote mb-0">
                                                  <p><?php echo "Php " . number_format($row['pdt_price'],2);?></p>
                                             </blockquote>
                                            
                                       </div>
                                       <div class="card-footer">
                                            <form action="process_add_to_cart.php" method="get">
                                                        <div class="input-group">
                                                            <input type="text" hidden class="form-control" name="pdt_id" value="<?php echo $row['pdt_id'];?>">
                                                            <input type="number" min="1" value="1" class="form-control" placeholder=1 name="cart_qty">
                                                            <input type="submit" value="Add to Cart" class="btn btn-primary">
                                                        </div>
                                            </form>
                                        </div> 
                                    </div>  
                                </div>
        <?php } ?>     
        </div><!---row-->
    <?php }   /*--page=home--*/ 

    else if($_GET['page'] == 'cart'){?>

        <!--============= Reference Number & checkout ===============-->

         <div class="col-4">
                        <?php
                            if(isset($_GET['checkout'])){ 
                        ?>
                                <h3 class="card-title">Order Summary</h3> <!--checkout-->
                                <div class="card-body">

                                    <?php
                                        $order_no = gen_order_ref_number(8); //generates a random order reference number (db file)

                                        $sql_checkout= "SELECT p.pdt_name
                                                            , p.pdt_price
                                                            , p.pdt_description
                                                            , p.pdt_img
                                                            , o.pdt_qty 
                                                            , o.orders_date_added
                                                            , o.order_id
                                                        FROM `orders` as o
                                                        JOIN `products` as p
                                                        ON (o.pdt_id = p.pdt_id)
                                                        WHERE o.user_id='$c_user_id' 
                                                        AND o.order_phase_status='1'";
                                                    
                                        $result_checkout = mysqli_query($conn,$sql_checkout);
                                ?>
                                <div class="alert alert-light">
                                    Order Reference Number: <?php echo $order_no; ?>
                                    <br>
                                    Receiver: <?php echo $_SESSION['users_fullname'] ; ?>
                                    <br>
                                    Address: <?php echo $_SESSION['users_address']; ?>
                                </div>

                                <ul class="list-group">
                                    <?php
                                
                                    $total_amt = 0.00; //initialize total amount

                                    //adds up every loop of the result.
                                    while ($full_order = mysqli_fetch_assoc($result_checkout)){
                                    
                                    $total_amt = $total_amt + ($full_order['pdt_price'] * $full_order['pdt_qty']);
                                    ?>
                                        <li class="list-group-item">
                                        <?php echo $full_order['pdt_name'] . " - Php " . number_format($full_order['pdt_price'],2) . " x " . $full_order['pdt_qty'] . " pcs";?></li>
                                    <?php } ?>

                                    <li class="list-group-item">
                                       <b> Total Amount to Pay: <?php echo "Php " . number_format($total_amt,2);?> </b>
                                    </li>
                                </ul>

                                <form action="process_order.php" method="post">
                                    <div class="mt-3">

                                        <input type="text" hidden name="o_total_amt_to_pay" value="<?php echo $total_amt; ?>">
                                    <label for="">Ship to this Address:</label>
                                        <input type="text" class="form-control mb-3" placeholder="This is Optional" name="o_alt_address">
                                    <label for="" class="form-label">Payment Method:</label> 

                                        <select name="o_payment_method" id="" class="form-select mb-3">
                                            <?php  
                                            $sql_get_payment_method = "SELECT *
                                                                         FROM `payment_method`;";

                                            $payment_method_result = mysqli_query($conn, $sql_get_payment_method);

                                            while($p_method = mysqli_fetch_assoc($payment_method_result)){ ?>
                                                <option value="<?php echo $p_method['payment_method_id'];?>"><?php echo $p_method['payment_method_desc'];?></option>
                                            <?php }
                                            ?>
                                        </select>
                                        
                                        <label for="">Shipping Options:</label>

                                            <select name="o_ship_option" class="form-select mb-2" id="">
                                                <?php  
                                                $sql_get_shipping_method = "SELECT * FROM `shipping`";

                                                $shipping_method_result = mysqli_query($conn, $sql_get_shipping_method);;

                                                while($p_method = mysqli_fetch_assoc($shipping_method_result)){ ?>
                                                    <option value="<?php echo $p_method['shipping_id'];?>"><?php echo $p_method['shipping_company'];?></option>
                                                <?php }
                                                ?>
                                            </select>
                                        
                                        <input readonly hidden type="text" name="o_order_ref_no" value="<?php echo $order_no; ?>">

                                        <input type="submit" value="Place Order" class="btn btn-warning">
                                    </div>
                                </form>

                            </div>
                    <?php } ?>

                   <?php
                    if(isset($_GET['msg'])){
                         $msg = $_GET['msg']; 
                         $status = "";
                            if($msg == 1){
                                $status = "Order Placed Successfully.";
                                ?>
                                <div class="alert alert-success">
                                    <?php echo $status;?>
                                </div>
                    <?php   }  
                            else{
                                $status = $_GET['msg'];
                                ?>
                                <div class="alert alert-danger">
                                     <?php echo $status;?>
                                </div>
                                <?php
                            }

                    }
                    ?>      

        <!--===============Display Cart =================-->
            
            <h6 class="display-6">Cart</h6>
                <?php 

                    $sql_get_cart_products = "SELECT p.pdt_name
                                                , p.pdt_price
                                                , p.pdt_description
                                                , p.pdt_img
                                                , o.pdt_qty
                                                , o.orders_date_added
                                                , o.order_id
                                             FROM `orders` as o
                                             JOIN `products` as p
                                               ON (o.pdt_id = p.pdt_id)
                                            WHERE (o.user_id='$c_user_id')
                                             AND o.order_phase_status='1'";
                    
                    $get_result = mysqli_query($conn, $sql_get_cart_products);
                    
                    echo "<table class='table'>";
                        while($cart = mysqli_fetch_assoc($get_result)){ ?>
                               <tr>
                                   <td> <img src="../webpics/<?php echo $cart['pdt_img']; ?>" alt="" class="img-fluid"> </td>
                                   <td> <?php echo $cart['pdt_name'];?> </td>
                                   <td> <?php echo $cart['pdt_qty'] . " pcs";?> </td>
                                   <td> <?php echo "Php " . number_format($cart['pdt_price'] * $cart['pdt_qty'],2); ?> </td>
                                   <td> <a href="process_delete_from_cart.php?delete_from_cart=<?php echo $cart['order_id'];?>" class="btn btn-danger btn-sm">x</a> </td>
                               </tr>
        </div><!----col-4-->
                        <?php }
                    echo "</table>";
                    ?>
                    <hr>
                   <a href="?page=cart&checkout" class="btn btn-warning">Checkout</a>

    <?php } /*page=cart*/

        /*=============== MY ORDERS PAGE =================*/

       else if($_GET['page'] == 'myorder'){?>
                    <div class="row">
                    <?php
                        $sql_get_user_order = "SELECT DISTINCT 
                                                  o.order_ref_no
                                                , pm.payment_method_desc
                                                , ops.order_phase_desc
                                                , o.payment_method
                                                , o.order_phase_status
                                                , o.alternate_address
                                                , o.gcash_ref_no
                                                , o.gcash_account_name
                                                , o.gcash_account_no
                                                , o.gcash_amount_sent
                                             FROM `orders` as o
                                             JOIN `payment_method` as pm
                                               ON o.payment_method = pm.payment_method_id /*payment table*/
                                             JOIN `order_phase_status` as ops 
                                               ON o.order_phase_status = ops.order_phase_id
                                            WHERE o.user_id = '$c_user_id' ";      
                    $sql_user_result_orders = mysqli_query($conn, $sql_get_user_order);
                    
                    
                    while($rec = mysqli_fetch_assoc($sql_user_result_orders)){ //first loop with only the order_reference_number ?>
                     <div class="col-3">
                         <div class="card mt-3">
                             <h6 class="card-title mt-1 ms-1"><?php 
                                                        echo $rec['order_ref_no'];
                                                        $curr_order_ref_no = $rec['order_ref_no'];
                                                    ?>
                                                    <div class="float-end">
                                                    <span class="badge rounded-pill text-bg-success"><?php echo $rec['payment_method_desc'];?></span>
                                                    <span class="badge rounded-pill 
                                                        <?php 
                                                                 switch($rec['order_phase_status']){ //order status it corresponds in the database
                                                                     case 0: echo "text-bg-danger"; 
                                                                         break;
                                                                     case 2: echo "text-bg-primary"; 
                                                                         break;
                                                                     case 3: echo "text-bg-info";
                                                                         break;
                                                                     case 4: echo "text-bg-warning";
                                                                         break;
                                                                     case 5: echo "text-bg-success";
                                                                         break;
                                                                     default: echo "text-bg-secondary";
                                                                 }
                                                                 ?> "><?php echo $rec['order_phase_desc'];?></span>
                                                   <?php if($rec['order_phase_status'] == '2') { ?>
                                                     <a href="process_cancel_order.php?cancel_full_order=<?php echo $rec['order_ref_no']; ?>" class="btn btn-danger btn-sm me-1"> x </a>
                                                   <?php } ?>
                                                    </div>
                                                    
                            </h6>
                            <?php
                             if($rec['payment_method'] == 2){  ?>
                                 <div class="card-caption p-2">
                                     <small class="small">Gcash Reference Number: <?php echo $rec['gcash_ref_no'];?></small> <br>
                                     <small class="small">Gcash Account Name: <?php echo $rec['gcash_account_name'];?></small> <br>
                                     <small class="small">Gcash Account Number: <?php echo $rec['gcash_account_no'];?></small> <br>
                                     <small class="small">Gcash Amount Sent: <?php echo $rec['gcash_amount_sent'];?></small>
                                 </div>
                             <?php }
                             ?>
                                        <?php
                                               $sql_get_user_pdt_order = "SELECT 
                                                                           p.pdt_img
                                                                         , p.pdt_name
                                                                         , p.pdt_price
                                                                         , o.pdt_qty
                                                                      FROM `orders` as o
                                                                      JOIN `products` as p
                                                                        ON o.pdt_id = p.pdt_id
                                                                     WHERE o.user_id = '$c_user_id' 
                                                                         AND o.order_ref_no = '$curr_order_ref_no'";

                                              $sql_execute_pdt_order = mysqli_query($conn, $sql_get_user_pdt_order); ?>

                                        <div class="list-group">
                                               <?php 
                                                    $total_amt = 0.00;

                                                    while($po = mysqli_fetch_assoc($sql_execute_pdt_order)){ 

                                                    $total_amt = $total_amt + ($po['pdt_qty'] * $po['pdt_price']);
                                                ?>
                                                   <li class="list-group-item">
                                                              <img src="../webpics/<?php echo $po['pdt_img'];?>" width="40px" alt="" class="img-fluid">
                                                               <?php echo $po['pdt_name'] . " x ";?>
                                                               <?php echo $po['pdt_qty'] . " pcs <br>";?>
                                                              <small class="small float-end"> <?php echo "Php " . number_format($po['pdt_price'],2);?></small>
                                                  </li>
                                               <?php } ?>
                                               
                                               
                                                </div>
                                                <div class="card-footer">
                                                    <span class="float-end"> Total Amount: <b> <?php echo "Php " . number_format($total_amt,2); ?> </b> </span> 
                                                </div>
                                               
                                                    <?php if($rec['alternate_address'] != NULL){ ?>
                                                         <div class="card-footer">
                                                               <small class="small">
                                                                <?php echo "Alternate Address: " . $rec['alternate_address'] . "<br>"; ?>
                                                                </small>
                                                        </div>
                                                <?php } ?>
                         </div>
                     </div>
                    <?php } ?>
                    </div>
                <?php }
    } /*--page--*/
    else {
        
    }
    ?>

    </div><!--container-fluid-->
</body>
   <script src="../js/bootstrap.js"></script>
</html>