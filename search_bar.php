<?php
include 'dbconnect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}

if($_SESSION['users_user_type'] != 'C'){
    header("location:index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/homepage.css">   
    <link rel="stylesheet" href="css/search_bar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"> 
    <link rel="stylesheet" href="https://unpkg.com/ionicons@5.5.2/dist/css/ionicons.min.css">
    <title>search page</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<div class="top-border">
        <div class="dropdown">
            <button class="dropdown-button"><ion-icon name="menu-outline"></ion-icon></button> <!-- Changed icon name to include -outline -->
            <div class="dropdown-content">
                <a href="common_user/index.php?page=home" class="btn btn-link" style="text-decoration: none; color: white; font-family: 'Montserrat';">
                    <ion-icon name="home-outline"></ion-icon> Home
                </a>
                <a href="common_user/index.php?page=cart" class="btn btn-link" style="text-decoration: none; color: white; font-family: 'Montserrat';">
                    <ion-icon name="cart-outline"></ion-icon> Cart
                </a>
                <a href="common_user/index.php?page=myorder" class="btn btn-link" style="text-decoration: none; color: white; font-family: 'Montserrat';">
                    <ion-icon name="bag-outline"></ion-icon> My Order
                </a>
            </div>
        </div>
</div>

<section class="search-form" style="text-align: center;">
    <form action="" method="POST"><!--html skanya? -->
        <input type="search" name="search" placeholder="Find your wristique" required style="padding: 10px; width: 50%; margin-top: 20px; margin-bottom: 18px;">
        <input type="submit" name="submit" value="search" class="btn btn-primary">
    </form> 
</section>

   <div class="box-container" style="align-items: center; text-align: center; display: flex">
    <?php
  if (isset($_POST['submit'])) {
    $search = $_POST['search'];

    $sql_search = "SELECT * FROM products 
                    WHERE (pdt_name LIKE '%$search%' OR pdt_description LIKE '%$search%' OR pdt_keywords LIKE '%$search%' OR pdt_price LIKE '%$search%')
                    AND pdt_status = 'A'";
    $execute_search = mysqli_query($conn,$sql_search);
    $count_result = mysqli_num_rows($execute_search);

    if($count_result > 0){
        while($row=mysqli_fetch_assoc($execute_search)){
            ?>
            <div class="row">
                <div class="container">
                    <form action="common_user/index.php?page=cart" method="post">
                        <input type="hidden" name="s_pdt_id" value="<?= htmlspecialchars($row['pdt_id']); ?>">
                        <input type="hidden" name="s_pdt_name" value="<?= htmlspecialchars($row['pdt_name']); ?>">
                        <input type="hidden" name="s_pdt_price" value="<?= htmlspecialchars($row['pdt_price']); ?>">
                        <input type="hidden" name="s_pdt_img" value="<?= htmlspecialchars($row['pdt_img']); ?>">
                        
                        <!-- <a href="quick_view.php?pid=<?= htmlspecialchars($row['pdt_id']); ?>" class="fas fa-eye"></a> -->
                        <img src="webpics/<?= htmlspecialchars($row['pdt_img']); ?>" alt="" style="width: 150px;">
                        <div class="name"><?= htmlspecialchars($row['pdt_name']); ?></div>
                        <div class="flex">
                            <div class="price"><span>₱</span><?= htmlspecialchars($row['pdt_price']); ?><span></span></div>
                            <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
                        </div>
                        <button type="submit" name="add_to_cart">Add to Cart</button>
                    </form>
                </div>
            </div>
            <?php
        }
    } else {
        echo '<p class="empty">No results found.</p>';
    }
}
      
    ?>
 </div>

 
 </body>
    <script src="js/script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
 </html>
 