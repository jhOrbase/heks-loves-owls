<?php
include_once "dbconnect.php";

if(isset($_SESSION['users_user_type'])) {
    if($_SESSION['users_user_type'] == 'A'){
       header("location: admin/");   
       exit; 
    }

    if($_SESSION['users_user_type'] == 'C'){
       header("location: common_user/");
       exit; 
    }
} 
/*else {
    echo "User type not defined. Please login first.";
    exit;
}*/
?>
   <head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style/homepage.css">
</head>
<body>

<!--===============Border=================--> 
    <div class="top-border">
        <div class="links"><a href="signup.php">Signup</a>
        <div class="links"><a href="login.php">Log In</a>
    </div>

    <?php include_once "../additional_header.php"; ?>

<!--=============GET PRODUCTS===============-->

    <div class="container-fluid">
        <div class="row">
           <?php                                
               $sql_post_products = "SELECT * FROM `products` 
                                        WHERE `pdt_status`='A' 
                                    order by pdt_id ASC";

               $post_result = mysqli_query($conn, $sql_post_products); ?>
             
                   <?php
                       while ( $row = mysqli_fetch_assoc($post_result) ){ ?>
                               <div class="col-3 p-0">
                                   <div class="card">
                                       <img src="webpics/<?php echo $row['pdt_img'];?>" width="100px" class="card-img">
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
                                       <a href="" class="btn btn-success">Log-in to Buy</a>

                                       </div>
                                       
                                   </div>
                               </div>
                       <?php }
                   ?>      
       </div>
   </div>
    
    <!--=====bottom border====-->


</body>
    <script src="js/bootstrap.js"></script>
    <script>
        filterSelection("all")
        function filterSelection(c) {
        var x, i;
        x = document.getElementsByClassName("column");
        if (c == "all") c = "";
        for (i = 0; i < x.length; i++) {
            w3RemoveClass(x[i], "show");
            if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
        }
        }

        function w3AddClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
        }
        }

        function w3RemoveClass(element, name) {
        var i, arr1, arr2;
        arr1 = element.className.split(" ");
        arr2 = name.split(" ");
        for (i = 0; i < arr2.length; i++) {
            while (arr1.indexOf(arr2[i]) > -1) {
            arr1.splice(arr1.indexOf(arr2[i]), 1);     
            }
        }
        element.className = arr1.join(" ");
        }


        // Add active class to the current button (highlight it)
        var btnContainer = document.getElementById("myBtnContainer");
        var btns = btnContainer.getElementsByClassName("btn");
        for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function(){
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
        }
    </script>
</html>