<?php 
include_once "../dbconnect.php";
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../style/dashboard.css">
</head>
<body>
<!-- <div class ="border-top-1">Reports</div>  palitan or tanggalin depende sainyo -->
   <div class="container">
       <div class="row">
        <!--==================Per-Product Report===================-->
           <div class="col-6 ">

                <div class="card ps-1">
                    <h3 class="title">Per Product</h3>
                    <div class="bottom-border-line"></div>
                    <!-- <div class="title">Per Product</div>    -->
                       <div class="card-body">
                           <h1 class="display-1">
                                <?php
                                    $sql_get_per_product = "SELECT DISTINCT 
                                                            p.pdt_name as pdt_name 
                                                            ,  p.pdt_img as pdt_img   
                                                            ,  SUM(o.pdt_qty) as total_pdt_qty
                                                            ,  SUM(p.pdt_price * o.pdt_qty) as total_amt
                                                            FROM orders as o
                                                            JOIN products as p 
                                                            ON o.pdt_id = p.pdt_id
                                                            GROUP BY p.pdt_name, p.pdt_img
                                                            ORDER BY p.pdt_name DESC;";
                                    $sql_execute_result = mysqli_query($conn, $sql_get_per_product);?>
                                    <table class="table table-striped">
                                        <tr>
                                            <th></th> <!--for image column-->
                                            <th>Date</th>
                                            <th>Total Product Qty</th>
                                            <th>Total Sales</th>
                                        </tr>
                                        <?php 
                                        $total = 0.00;
                                        while($rec = mysqli_fetch_assoc($sql_execute_result)){
                                            $total += $rec['total_amt']; //formula
                                            ?>
                                                <tr>
                                                    <td> <img src="../webpics/<?php echo $rec['pdt_img'];?>" alt="" class="img-fluid" width="25px"> </td>
                                                    <td><?php echo $rec['pdt_name'];?></td>
                                                    <td><?php echo $rec['total_pdt_qty'];?></td>
                                                    <td><?php echo "₱" . number_format($rec['total_amt'],2);?></td>
                                                </tr>         
                                    <?php } ?>
                                                <tr>
                                                    <td colspan=4 class="bg-light" > 
                                                        <small class="float-end" ><?php echo "Php " . number_format($total,2);?></small> 
                                                    </td>
                                                </tr>
                                </table> 
                           </h1>
                       </div>
                   </div>
                </div>
        <!--==================Per-Day Report===================-->
           <div class="col-6 ">
                   <div class="card ps-1">
                       <h3 class="title">Per Day</h3>
                    <div class="bottom-border-line"></div>
                       <div class="card-body">
                           <h1 class="display-1">
                           <?php
                                    $sql_get_per_day = " SELECT
                                                              CAST(o.orders_date_added as DATE) as transaction_date_added
                                                            , SUM(o.pdt_qty) as total_pdt_qty
                                                            , SUM(p.pdt_price * o.pdt_qty) as total_amt
                                                            FROM 
                                                                orders as o 
                                                            JOIN 
                                                                products p ON o.pdt_id = p.pdt_id
                                                            GROUP BY 
                                                                CAST(o.orders_date_added as DATE)
                                                            ORDER BY 
                                                                CAST(o.orders_date_added as DATE) DESC;";

                                    $sql_execute_result = mysqli_query($conn, $sql_get_per_day);
                            ?>
                                <table class="table table-striped">
                                    <tr>
                                        <!--column-->
                                        <th>Date</th>
                                        <th>Total Item Qty</th>
                                        <th>Total Sales</th>
                                    </tr>
                                        <?php 
                                        $total = 0.00;
                                        while($rec = mysqli_fetch_assoc($sql_execute_result)){
                                        $total += $rec['total_amt'];?>
                                    <tr>
                                        <!--row-->
                                        <td><?php echo $rec['transaction_date_added'];?></td>
                                        <td><?php echo $rec['total_pdt_qty'];?></td>
                                        <td><?php echo "₱" . number_format($rec['total_amt'],2);?></td>
                                    </tr>          
                                    <?php } ?>
                                    <tr>
                                        <td colspan=3 class="bg-light"> 
                                            <small class="float-end"><?php echo "₱" . number_format($total,2);?></small> 
                                        </td>
                                    </tr>
                                </table> 
                           </h1>
                       </div>
                   </div>
           </div>
            <!--==================Per-Order Report===================-->
           <div class="col-6 ">
                   <div class="card ps-1">
                   <h3 class="title">Per Order</h3>
                    <div class="bottom-border-line"></div> 
                       <div class="card-body">
                           <h1 class="display-1">
                           <?php 
                                $sql_get_per_order = " SELECT DISTINCT 
                                                        o.order_ref_no AS order_ref_no
                                                        , SUM(o.pdt_qty) AS total_pdt_qty
                                                        , SUM(p.pdt_price * o.pdt_qty) AS total_amt
                                                        FROM 
                                                            orders as o 
                                                        JOIN 
                                                            products as p 
                                                        ON 
                                                            o.pdt_id = p.pdt_id
                                                        GROUP BY 
                                                            o.order_ref_no;";

                                $sql_execute_result = mysqli_query($conn, $sql_get_per_order);
                            ?>
                               
                                <table class="table table-striped">
                                    <tr>
                                        <th>Order Reference Number</th>
                                        <th>Total Item Qty</th>
                                        <th>Total Sales</th>
                                    </tr>
                                     <?php 
                                     $total = 0.00;
                                    while($rec = mysqli_fetch_assoc($sql_execute_result)){
                                     $total += $rec['total_amt'];
                                    ?>
                                    <tr>
                                        <td><?php echo $rec['order_ref_no'];?></td>
                                        <td><?php echo $rec['total_pdt_qty'];?></td>
                                        <td><?php echo "Php " . number_format($rec['total_amt'],2);?></td>
                                    </tr>       
                                     <?php } ?>
                                       <tr>
                                        <td colspan=3 class="bg-light"> <small class="float-end"><?php echo "₱" . number_format($total,2);?></small> </td>
                                    </tr>
                                </table>
                               
                           </h1>
                       </div>
                   </div>      
           </div>
        <!--==================Per-User Report===================-->
           <div class="col-6 ">
                   <div class="card ps-1">
                   <h3 class="title">Per User</h3>
                    <div class="bottom-border-line"></div> 
                       <div class="card-body">
                           <h1 class="display-1">
                                <?php
                                $sql_get_per_user = "SELECT DISTINCT *
                                                        FROM (
                                                            SELECT 
                                                                u.fullname AS fullname,
                                                                u.username AS username,
                                                                u.email as email,
                                                                SUM(o.pdt_qty) AS total_pdt_qty,
                                                                SUM(p.pdt_price * o.pdt_qty) AS total_amt
                                                            FROM orders o
                                                            JOIN products p ON o.pdt_id = p.pdt_id
                                                            JOIN users u ON o.user_id = u.user_id
                                                            GROUP BY u.fullname, u.username, u.email
                                                            ORDER BY u.fullname DESC
                                                        ) AS total_per_user;";
                                $sql_execute_result = mysqli_query($conn, $sql_get_per_user); ?>
                                <table class="table table-striped">
                                    <tr>
                                        <th>Fullname</th>
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Total Product Qty</th>
                                        <th>Total Sales</th>
                                    </tr>
                                     <?php 
                                    $total=0.00;
                                    while($rec = mysqli_fetch_assoc($sql_execute_result)){
                                     $total += $rec['total_amt'];
                                    ?>
                                    <tr>
                                        <td><?php echo $rec['fullname'];?></td>
                                        <td><?php echo $rec['email'];?></td>
                                        <td><?php echo $rec['username'];?></td>
                                        <td><?php echo $rec['total_pdt_qty'];?></td>
                                        <td><?php echo "Php " . number_format($rec['total_amt'],2);?></td>
                                    </tr>      
                                             
                                         
                                     <?php } ?>
                               
                                    <tr>
                                        <td colspan=5 class="bg-light">
                                            <small class="float-end">
                                                <?php echo "Php " . number_format($total,2);?>
                                            </small> 
                                        </td>
                                    </tr>
                                </table>
                               
                           </h1>
                       </div>
                   </div>
           </div>
        <!--==================Yesterday vs Today Report===================-->
        <div class="col-6 ">
            <div class="card ps-1">
            <h3 class="title">Yesterday vs Today's Sales</h3>
                    <div class="bottom-border-line"></div>               
                    <div class="card-body">
                            <h1 class="display-1">
                                <table class="table table-striped">
                                        <?php
                        /*sql query for yesterday*/ 
                                        $yesterday_sql = "SELECT 
                                                            SUM(o.pdt_qty) AS total_pdt_qty_yesterday,
                                                            SUM(p.pdt_price * o.pdt_qty) AS total_amt_yesterday
                                                        FROM 
                                                            orders AS o
                                                        JOIN 
                                                            products p ON o.pdt_id = p.pdt_id
                                                        WHERE 
                                                            CAST(o.orders_date_added AS DATE) = DATE_SUB(CURDATE(), INTERVAL 1 DAY)";
                                        $yesterday_result = mysqli_query($conn, $yesterday_sql);
                                        $yesterday_rec = mysqli_fetch_assoc($yesterday_result); ?>
                                        <tr>
                                            <!--column-->
                                            <th>Yesterday's Date</th>
                                            <th>Total Item Qty</th>
                                            <th>Total Sales</th>
                                        </tr>
                                        <tr>
                                            <!--row-->
                                            <td><?php echo date('Y-m-d', strtotime('-1 day'));?></td>
                                            <td><?php echo $yesterday_rec['total_pdt_qty_yesterday'];?></td>
                                            <td><?php echo "₱". number_format($yesterday_rec['total_amt_yesterday'],2);?></td>
                                        </tr>
                                        
                                    <?php
                        /*sql query for today*/
                                        $today_sql = "SELECT 
                                                        SUM(o.pdt_qty) AS total_pdt_qty_today,
                                                        SUM(p.pdt_price * o.pdt_qty) AS total_amt_today
                                                    FROM 
                                                        orders AS o
                                                    JOIN 
                                                        products p ON o.pdt_id = p.pdt_id
                                                    WHERE 
                                                        CAST(o.orders_date_added AS DATE) = CURDATE()";
                                        $today_result = mysqli_query($conn, $today_sql);
                                        $today_rec = mysqli_fetch_assoc($today_result);
                                    ?>
                                        <tr>
                                            <!--column-->
                                            <th>Today's Date</th>
                                            <th>Total Item Qty</th>
                                            <th>Total Sales</th>
                                        </tr>
                                        <tr>
                                            <!--row-->
                                            <td><?php echo date('Y-m-d');?></td>
                                            <td><?php echo $today_rec['total_pdt_qty_today'];?></td>
                                            <td><?php echo "₱". number_format($today_rec['total_amt_today'],2);?></td>
                                        </tr>                 
                                                    <!--simple if-else statements to compare the results-->
                                                    <?php 
                                                    if ($yesterday_rec['total_amt_yesterday'] > $today_rec['total_amt_today']) { ?>
                                                        <td colspan=3 class="bg-light"> 
                                                            <small class="float-end"><?php echo "Yesterday's sale was better";?></small> 
                                                        </td>
                                                    <?php }
                                                    else if ($yesterday_rec['total_amt_yesterday'] < $today_rec['total_amt_today']){ ?>
                                                        <td colspan=3 class="bg-light"> 
                                                            <small class="float-end"><?php echo "Today's sale was better";?></small> 
                                                        </td>
                                                    <?php } 
                                                    else if(($yesterday_rec['total_amt_yesterday'] == '0' || $today_rec['total_amt_today'] == '0')){ ?>
                                                        <td colspan=3 class="bg-light"> 
                                                            <small class="float-end"><?php echo "Today's sale was better";?></small> 
                                                        </td>
                                                    <?php }
                                                    else { ?>
                                                        <td colspan=3 class="bg-light"> 
                                                            <small class="float-end"><?php echo "Yesterday's and Today's sales are equal";?></small> 
                                                        </td>
                                                    <?php } ?>
                                </table>
                            </h1>
                        </div>
                    </div>
                </div>
        <!--==================Yearly Sales===================-->
        <div class="col-6 ">
    <div class="card ps-1">
                <h3 class="title">Yearly Sales</h3>
                    <div class="bottom-border-line"></div>                
            <div class="card-body">
                <h1 class="display-1">
                    <table class="table table-striped">
                        <tr>
                            <th>Year</th>
                            <th>Total Product Qty</th>
                            <th>Total Sales</th>
                        </tr>
                        <?php
                        $sql_get_yearly = "SELECT 
                                            YEAR(o.orders_date_added) AS date_year,
                                            SUM(o.pdt_qty) AS total_pdt_qty_year,
                                            SUM(p.pdt_price * o.pdt_qty) AS total_amt_yearly
                                        FROM 
                                            orders AS o
                                        JOIN 
                                            products p ON o.pdt_id = p.pdt_id
                                        GROUP BY 
                                            YEAR(o.orders_date_added)
                                        ORDER BY 
                                            YEAR(o.orders_date_added) DESC";
                        $yearly_result = mysqli_query($conn, $sql_get_yearly);

                        $overall_pdt_qty = 0;
                        $overall_total_amt = 0;

                        while($yearly_rec = mysqli_fetch_assoc($yearly_result)){?>
                            <tr>
                                <!--row-->
                                <td><?php echo $yearly_rec['date_year'];?></td>
                                <td><?php echo $yearly_rec['total_pdt_qty_year'];?></td>
                                <td><?php echo "₱". number_format($yearly_rec['total_amt_yearly'],2);?></td>
                            </tr>
                        <?php 
                            $overall_pdt_qty += $yearly_rec['total_pdt_qty_year'];
                            $overall_total_amt += $yearly_rec['total_amt_yearly'];
                        ?>
                        <?php }?>
                                <td><strong>Overall</strong></td>
                                <td><strong><?php echo $overall_pdt_qty;?></strong></td>
                                <td><strong>₱<?php echo number_format($overall_total_amt,2);?></strong></td>
                            </tr>
                    </table>
                </h1>
            </div>
        </div>
    </div>


            </div>
       </div>
   </div> 
</body>
<script src="../js/bootstrap.js"></script>
</html>