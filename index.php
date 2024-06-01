<?php
session_start();
include_once "dbconnect.php";

if (isset($_SESSION['users_user_type'])) {
    if ($_SESSION['users_user_type'] == 'A') {
        header("Location: admin/");
        exit;
    }

    if ($_SESSION['users_user_type'] == 'C') {
        header("Location: common_user/");
        exit;
    }
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style/homepage.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php include_once "top_border.php"; ?>
<!--===============Border=================--> 
<div class="additional-border">
    <div class="title-content">
        <div class="title_text"> 
            <span style="font-weight: bold;">WRISTIQUE</span><br>
            <span>WATCHES</span>
        </div>     
        <img class="img" src="webpics/WatchHomepageImage1.jpg" alt="Watch Image3">
        <div class="title_text2"> 
            THE COLLECTION
        </div>
    </div>
</div>
<div class="container-content">
    <div class="content1">
        Explore the Wristique <br> Collection
    </div>
    <div class="content2">
        <div class="content2-text1">
            The Wristique collection offers a wide range of prestigious,<br>
            high-precision timepieces, from Professional to Classic<br>
            models to suit any wrist.
        </div>
    </div>
</div>
<div class="content2-text2">
    Find your Wristique>
</div>
<div id="demo" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
    </ul>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="webpics/display3.jpg" alt="img display3" width="1500" height="500">
            <div class="carousel-caption">
                <h3>WRISTIQUE</h3>
                <p>Gentlemen's Choice</p>
            </div>   
        </div>
        <div class="carousel-item">
            <img src="webpics/display4.jpg" alt="img display4" width="1500" height="500">
            <div class="carousel-caption">
                <h3>since 1998</h3>
                <p>Made in a limited edition</p>
            </div>   
        </div>
        <div class="carousel-item">
            <img src="webpics/display2.jpg" alt="img display2" width="1500" height="500">
            <div class="carousel-caption">
                <h3>Get yours now</h3>
                <p>for a 10% off on your first purchase</p>
            </div>   
        </div>
    </div>
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
</div>
<!-- below carousel -->
<div class="latest-content">
    <div class="latest1">
        Offering unique harmonies of materials, colours and textures,<br>
        the 2024 watches illustrate our desire to constantly reawaken watchmaking emotions,
        while demonstrating uncompromising <br>quality down to the smallest detail. 
    </div>
    <div class="latest2">
        <div class="latest2-text1">
            Wristique brings a fresh new look to
            some of its most new iconic models.
        </div>
    </div>
</div>
<!--=============GET PRODUCTS===============-->
<div class="container-fluid">
    <div class="row">
        <?php                                
        $sql_post_products = "SELECT * FROM `products` 
                                WHERE `pdt_status`='A' 
                                ORDER BY pdt_id ASC";
        $post_result = mysqli_query($conn, $sql_post_products);
        while ($row = mysqli_fetch_assoc($post_result)) { ?>
            <div class="col-3 p-0">
                <div class="card">
                    <img src="webpics/<?php echo $row['pdt_img']; ?>" width="100px" class="card-img">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo $row['pdt_name']; ?></h3>
                        <p class="card-text"><?php echo $row['pdt_description']; ?></p>
                        <blockquote class="blockquote mb-0">
                            <p><?php echo "Php " . number_format($row['pdt_price'], 2); ?></p>
                        </blockquote>
                    </div>
                    <div class="card-footer">
                        <a href="login.php" class="btn btn-success">Log-in to Buy</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<!--=====BOTTOM PIC====-->
<div class="carousel-inner">
    <div class="carousel-item active">
        <img src="webpics/bottom.png" alt="img display3" width="1380" height="500">
        <div class="carousel-caption">
            <h3>WRISTIQUE</h3>
            <p>Gentlemen's Choice</p>
        </div>   
    </div>
</div>
<!--=====BOTTOM BORDER====-->
<div class="bottom-border"></div>
</body>
</html>
