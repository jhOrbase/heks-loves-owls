<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/homepage.css">   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"> 
    <link rel="stylesheet" href="https://unpkg.com/ionicons@5.5.2/dist/css/ionicons.min.css"> <!-- Added Ionicons library -->
</head>
<body>
    <div class="top-border">
        <div class="dropdown">
            <button class="dropdown-button"><ion-icon name="menu-outline"></ion-icon></button> <!-- Changed icon name to include -outline -->
            <div class="dropdown-content">
                <a href="?page=home" class="btn btn-link" style="text-decoration: none; color: white; font-family: 'Montserrat';">
                    <ion-icon name="home-outline"></ion-icon> Home
                </a>
                <a href="?page=cart" class="btn btn-link" style="text-decoration: none; color: white; font-family: 'Montserrat';">
                    <ion-icon name="cart-outline"></ion-icon> Cart
                </a>
                <a href="?page=myorder" class="btn btn-link" style="text-decoration: none; color: white; font-family: 'Montserrat';">
                    <ion-icon name="bag-outline"></ion-icon> My Order
                </a>

                <hr class="hr-custom">

                <a href="?logout" class="btn btn-link" style="text-decoration: none; color: white; font-family: 'Montserrat';">
                    <ion-icon name="log-out-outline"></ion-icon> Logout
                </a> <!-- Added closing </a> tag -->

                <a href="signup.php" class="btn btn-link" style="text-decoration: none; color: white; font-family: 'Montserrat';">
                    <ion-icon name="person-add-outline"></ion-icon> Sign up    
                </a>
            </div>
        </div>
        <a href="../search_bar.php" class="btn btn-link float-end" style="text-decoration: none; color: white; font-family: 'Montserrat'; margin-right: 20px;">
            <ion-icon name="search-outline"></ion-icon>
        </a>

    </div>

   
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
