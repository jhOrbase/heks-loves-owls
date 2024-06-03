<?php
include 'dbconnect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}
else{
   $user_id = '';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>search page</title>
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>

<section class="search-form">
    <form action="" method="POST"><!--html skanya? -->
        <input type="search" name="search" placeholder="Find your wristique" required>
        <input type="submit" name="submit" value="search" class="btn btn-primary">
    </form> 
</section>

   <div class="box-container">

    <?php
    if (isset($_POST['submit'])) {
      $search = $_POST['search'];

      $sql_search = "SELECT * FROM products 
                        WHERE (pdt_name LIKE '%$search%' OR pdt_description LIKE '%$search%')
                        AND pdt_status = 'A'";
      $execute_search = mysqli_query($conn,$sql_search);
      $count_result = mysqli_num_rows($execute_search);

    if($count_result>0){
    while($row=mysqli_fetch_assoc($execute_search)){
    ?>
    <form action="" method="post" class="box">
       <input type="hidden" name="pid" value="<?= htmlspecialchars($row['pdt_id']); ?>">
       <input type="hidden" name="name" value="<?= htmlspecialchars($row['pdt_name']); ?>">
       <input type="hidden" name="price" value="<?= htmlspecialchars($row['pdt_price']); ?>">
       <input type="hidden" name="image" value="<?= htmlspecialchars($row['pdt_img']); ?>">
 
       
       <!-- <a href="quick_view.php?pid=<?= htmlspecialchars($row['pdt_id']); ?>" class="fas fa-eye"></a> -->
       <img src="webpics/<?= htmlspecialchars($row['pdt_img']); ?>" alt="">
       <div class="name"><?= htmlspecialchars($row['pdt_name']); ?></div>
       <div class="flex">

          <div class="price"><span>$</span><?= htmlspecialchars($row['pdt_price']); ?><span>/-</span></div>
          <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="1">
       </div>
       <input type="submit" value="add to cart" class="btn" name="add_to_cart">
    </form>
    <?php
              }
          } else {
              echo '<p class="empty">No results found.</p>';
          }
      
    ?>
 </div>
<?php } ?>
 
 <script src="js/script.js"></script>
 
 </body>
 </html>
 