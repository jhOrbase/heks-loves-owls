<html>
<?php 

include_once "../dbconnect.php"; 

session_start();
$s_user_id = $_SESSION['users_info_id'];

if($_SESSION['users_user_type'] != 'A'){
    header("location:index.php");
    exit;
}

if(isset($_GET['logout'])){
    session_destroy();
    header("location: ../login.php"); //login page or visitor page hmmm?
    die();
}

//echo "welcome admin";
?>  
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/bootstrap.css"> 
    <link rel="stylesheet" href="../style/admin.css">
    <title>Admin</title>
</head>
<body>
    <div class="border-top-0" style="background-color: green">
            <a href="#"  style="text-decoration: none; color: white; float: left; margin-left: 85vh; "> ADMIN PAGE</a><br>
            <a href="?manageproducts" class="btn btn-link" style="text-decoration: none; color: white; font-size: large;">Manage Products</a>
            <a href="?manageorder" class="btn btn-link" style="text-decoration: none; color: white; font-size: large;">Manage Orders</a>
            <a href="?dashboard" class="btn btn-link" style="text-decoration: none; color: white; font-size: large;">Dashboards</a>
            <a href="?logout" class="btn btn-link" style="text-decoration: none; color: white; font-size: large;">Log out</a>
            <a href="?registered_users" class="btn btn-link" style="text-decoration: none; color: white; font-size: large;">Customer Info</a>
    </div>

<!--============================ M A N A G E - P R O D U C T S ================================-->

<?php
 if(isset($_GET['manageproducts'])) { ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-4 bg-success text-light">
                <?php
                    /*Deactivate Product Status*/
                    if(isset($_GET['deactivate_product'])){
                        $pdt_id =$_GET['deactivate_product'];

                        $sql_deactivate_product = "UPDATE products
                                                        SET `pdt_status`='I'
                                                   WHERE `pdt_id`='$pdt_id';";

                        mysqli_query($conn, $sql_deactivate_product);
                    }

                    /*Activate Status*/        
                    if(isset($_GET['activate_product'])){
                       $pdt_id = $_GET['activate_product'];

                       $sql_activate_product = "UPDATE products
                                                    SET `pdt_status`='A'
                                                WHERE `pdt_id`='$pdt_id';";

                        mysqli_query($conn,$sql_activate_product);
                    }

                    /*Update Product*/
                    if(isset($_GET['update_product'])){
                        $pdt_id = $_GET['update_product'];
                        
                        $sql_get_product_info = "SELECT * FROM products
                                                    WHERE pdt_id = '$pdt_id'";
                        $result = mysqli_query($conn, $sql_get_product_info);
                        $data_row = mysqli_fetch_assoc($result);
                ?>
                <h3 class="display-6">Update Product Info</h3>
                   <form action="process_update_product.php" method="POST">>
                    
                        <label for="">Product Id</label>
                        <input value="<?php echo $data_row['pdt_id'];?>" type="text" name="u_pdt_id" readonly class="form-control mb-3">
                        
                        <label for="">Product Name</label>
                        <input value="<?php echo $data_row['pdt_name'];?>" type="text" name="u_pdt_name" class="form-control mb-3">

                        <label for="">Product Description</label>
                        <input value="<?php echo $data_row['pdt_description'];?>"  type="text" name="u_pdt_description" class="form-control mb-3">

                        <label for="">Product Price</label>
                        <input value="<?php echo $data_row['pdt_price'];?>"  type="text" name="u_pdt_price" class="form-control mb-3">

                        <input type="submit" class="btn btn-primary">
                   </form>
                <?php
                }
                ?>
            <!--Add New Product--> 

             <hr>
              <h3 class="display-6">Add New Product</h3>
              
                  <?php 
                      if(isset($_GET['insert_status'])){
                          echo "<div class='alert alert-warning'>";
                              if($_GET['insert_status'] == '1') {
                                  echo "Product Added Successfully.";
                              }
                              else{
                                  echo "There was an error.";
                              }
                          echo "</div>";
                      }
                ?>

               <form action="process_new_product.php" method="POST" enctype="multipart/form-data">
                  <label for="">Product Name</label>
                   <input type="text" name="n_pdt_name" class="form-control mb-3">
                  
                  <label for="">Product Description</label>
                   <input type="text" name="n_pdt_description" class="form-control mb-3">
                  
                  <label for="">Product Price</label>
                   <input type="text" name="n_pdt_price" class="form-control mb-3">

                  <label for="">Product Image</label>
                      <input type="file" class="form-control mb-3" name="n_pdt_img">
                  
                  <input type="submit" class="btn btn-primary">
               </form>
        </div>

        <!--Update, Deactivate Function-->
           <div class="col-8">
               <?php
                    $sql_get_products = "SELECT * FROM products WHERE `pdt_status`='A' order by pdt_id ASC";
                    $get_result = mysqli_query($conn, $sql_get_products); 
               ?>
               <table class="table">
                   <?php
                       while ($row = mysqli_fetch_assoc($get_result) ){ ?>
                        <tr>
                            <td><img src="../webpics/<?php echo $row['pdt_img'];?>" alt="" class="img-fluid" width="100px"> </td>
                            <td><?php echo $row['pdt_status'];?></td>
                            <td><?php echo $row['pdt_name'];?></td>
                            <td><?php echo $row['pdt_description'];?></td>
                            <td><?php echo "Php " . number_format($row['pdt_price'],2);?></td>
                            <td> <a href="../admin/index.php?manageitems&update_product=<?php echo $row['pdt_id'];?>" class="btn btn-success">Update</a> </td>
                            <td> <a href="../admin/index.php?manageitems&deactivate_product=<?php echo $row['pdt_id'];?>" class="btn btn-danger">Deactivate</a> </td>
                        </tr>
                       <?php 
                       }
                   ?>
                   
        <!--Update, Activate Function-->
               <?php
                    $sql_get_products2 = "SELECT * FROM products WHERE `pdt_status`='I' order by pdt_id ASC";
                    $get_result2 = mysqli_query($conn, $sql_get_products2); 
               ?>
               <table class="table">
                   <?php
                       while ($row = mysqli_fetch_assoc($get_result2) ){ ?>
                        <tr>
                            <td><img src="../webpics/<?php echo $row['pdt_img'];?>" alt="" class="img-fluid" width="100px"> </td>
                            <td><?php echo $row['pdt_status'];?></td>
                            <td><?php echo $row['pdt_name'];?></td>
                            <td><?php echo $row['pdt_description'];?></td>
                            <td><?php echo "Php " . number_format($row['pdt_price'],2);?></td>
                            <td> <a href="../admin/index.php?manageitems&update_product=<?php echo $row['pdt_id'];?>" class="btn btn-success">Update</a> </td>
                            <td> <a href="../admin/index.php?manageitems&activate_product=<?php echo $row['pdt_id'];?>" class="btn btn-info">Activate</a> </td>
                        </tr>
                       <?php 
                       }
                   ?>
               </table>    
           </div>
        </div>
    </div>
    <?php
    }
    ?>


<!--============================== M A N A G E - O R D E R S ==================================-->

<?php if(isset($_GET['manageorder'])) { ?>
    <div class="row">
        <div class="col-12">
        <h3 class="display-3" style="text-align: center;">Orders</h3>
              <a href="?manageorder&order_phases=2" class="btn btn-link" style="text-decoration: none;color: black; font-size: large; margin-left: 75vh;">New</a>
              <a href="?manageorder&order_phases=3" class="btn btn-link" style="text-decoration: none;color: black; font-size: large;">Pending</a>
              <a href="?manageorder&order_phases=4" class="btn btn-link" style="text-decoration: none;color: black; font-size: large;">To Ship</a>
              <a href="?manageorder&order_phases=5" class="btn btn-link" style="text-decoration: none;color: black; font-size: large;">Delivered</a>
              <a href="?manageorder&order_phases=0" class="btn btn-link" style="text-decoration: none;color: black; font-size: large;">Cancelled</a>
        </div>

        <div class="container-fluid">
            <?php if(isset($_GET['order_phases'])){ 
              $order_phases = $_GET['order_phases'];
              ?>
             <div class="row">
              <?php
                 $sql_get_user_order = "SELECT DISTINCT 
                                                  o.order_ref_no
                                                , date(o.orders_date_added) as orders_date_added
                                                , pm.payment_method_desc
                                                , o.payment_method
                                                , op.order_phase_admin
                                                , o.order_phase_status
                                                , ui.fullname
                                                , ui.address
                                                , o.gcash_ref_no
                                                , o.gcash_account_name
                                                , o.gcash_account_no
                                                , o.gcash_amount_sent
                                             FROM orders as o
                                             JOIN payment_method as pm
                                               ON o.payment_method = pm.payment_method_id
                                             JOIN order_phase_status as op
                                               ON o.order_phase_status = op.order_phase_id
                                             JOIN users as ui
                                               ON o.user_id = ui.user_id
                                            WHERE ui.user_type = 'C'
                                              AND ui.user_status = 'A'
                                              AND o.order_phase_status = '$order_phases'
                                            ORDER BY o.orders_date_added ASC";    

                    $sql_result_orders = mysqli_query($conn, $sql_get_user_order);
              
              while($ro = mysqli_fetch_assoc($sql_result_orders)){ //first loop for the order reference number ?> 
                      <div class="col-3">
                          <div class="card p-3">
                                <div class="float-end">
                                                    <span class="badge rounded-pill text-bg-primary"><?php echo $ro['payment_method_desc'];?></span>
                                                    <span class="badge rounded-pill 
                                                        <?php 
                                                                 switch($ro['order_phase_status']){
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
                                                                 ?> "><?php echo $ro['order_phase_admin'];?></span>
                                                   <?php if($ro['order_phase_status'] == '2') { ?>
                                                     <a href="process_cancel_order.php?cancel_order=<?php echo $ro['order_ref_no']; ?>" class="btn btn-danger btn-sm me-1"> x </a>
                                                   <?php } ?>
                                                    </div>
                                                    
                              <p class="card-title">
                                  <small><i><?php echo $ro['orders_date_added'];?></i></small> <br>
                                  <b><?php echo $ro['order_ref_no'];?></b> <br>
                                  
                                  
                                  <small>Recipient: <?php echo strtoupper($ro['fullname']);?></small> <br>
                                  <small>Address: <?php echo strtoupper($ro['address']);?></small> 
                              </p>
                              
                              <?php
                             if($ro['payment_method'] == '2' && $ro['order_phase_status'] == '2'){  ?>
                                 <div class="card-caption p-2">
                                     <small class="small">Gcash Reference Number: <?php echo $ro['gcash_ref_no'];?></small> <br>
                                     <small class="small">Gcash Account Name: <?php echo $ro['gcash_account_name'];?></small> <br>
                                     <small class="small">Gcash Account Number: <?php echo $ro['gcash_account_no'];?></small> <br>
                                     <small class="small">Gcash Amount Sent: <?php echo "Php " . $ro['gcash_amount_sent'];?></small>
                                 </div>
                             <?php }
                             ?>
                              
                              <?php  
                              $curr_order_ref_no = "";
                              $curr_order_ref_no = $ro['order_ref_no'];
                            //walang pang lumalabas
                                                              
                                                              
                              $sql_get_order_products = "SELECT p.pdt_name
                                                              , p.pdt_img
                                                              , p.pdt_price
                                                              , o.pdt_qty
                                                            FROM orders as o
                                                            JOIN products as p
                                                            ON o.pdt_id = p.pdt_id
                                                            WHERE o.order_ref_no = '$curr_order_ref_no'";

                              $sql_product_orders_result = mysqli_query($conn, $sql_get_order_products);
                                                          
                              ?>
                              <ul class="list-group">
                                  <?php 
                                    $total_amt = 0.00;
                                    while ($pdt_ord = mysqli_fetch_assoc($sql_product_orders_result)){ 
                                  
                                  //inner 2nd loop to list all the items of the specified order reference number ?>
                                      
                                  <li class="list-group-item"><?php echo $pdt_ord['pdt_name'] . " x " . $pdt_ord['pdt_qty'] . " = <br><small>" . "Php " . number_format($pdt_ord['pdt_qty'] * $pdt_ord['pdt_price'], 2) . "</small>"; ?></li>
                                  
                                <?php
                                    $total_amt += $pdt_ord['pdt_qty'] * $pdt_ord['pdt_price']; 
                                    } ?>
                                
                                
                                  <li class="list-group-item bg-secondary text-light">
                                     <?php echo "Php " . number_format($total_amt, 2);?>
                                      
                                  </li>
                             
                                 <?php if($_GET['order_phases'] == '2') { ?>
                                  <li class="list-group-item">
                                      <a href="process_administer_orders.php?confirm_order=<?php echo $curr_order_ref_no; ?>" class="btn btn-success">Confirm</a>
                                  </li>
                                  <?php } ?>
                                  
                                 <?php if($_GET['order_phases'] == '3') { ?>
                                 <li class="list-group-item">
                                      <a href="process_administer_orders.php?ship_order=<?php echo $curr_order_ref_no; ?>" class="btn btn-primary">Ship</a>
                                  </li>
                                  <?php } ?>
                                 <?php if($_GET['order_phases'] == '4') { ?>
                                 <li class="list-group-item">
                                      <a href="process_administer_orders.php?complete_order=<?php echo $curr_order_ref_no; ?>" class="btn btn-primary">Complete</a>
                                  </li>
                                  <?php } ?>
                              </ul>  
                          </div>
                      </div>
              <?php }
              ?>
              </div>
            <?php 
                }/*order phase*/ 
            ?>
         </div> 
      </div>
    </div>
      <?php 
            } /*manage oder*/
        ?>
        <?php if(isset($_GET['dashboard'])){
                include_once "dashboard.php";
        }?>
        <?php if(isset($_GET['registered_users'])){
                include_once "registered_users.php";
        }?>
</body>
    <script src="../js/bootstrap.js"></script>
</html>