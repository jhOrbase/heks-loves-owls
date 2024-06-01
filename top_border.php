<div class="top-border">

    <div class="dropdown">
        <button class="dropdown-button"><ion-icon name="menu"></ion-icon></button>
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
        <a href="?logout" class="btn btn-link" style="text-decoration: none; color: white; font-family: 'Montserrat';">
            <ion-icon name="log-out-outline"></ion-icon> Logout
        </a>
    </div>
</div>
        
            <!-- <a href="?page=home" class="btn btn-link"style= "text-decoration: none;
            color: white;
            font-family: 'Montserrat'; "><ion-icon name="home-outline"></ion-icon></a>
            <a href="?page=cart" class="btn btn-link" style= "text-decoration: none;
            color: white;
            font-family: 'Montserrat';"><ion-icon name="cart-outline"></ion-icon></a>
            <a href="?page=myorder" class="btn btn-link" style= "text-decoration: none;
            color: white;
            font-family: 'Montserrat';"><ion-icon name="bag-outline"></ion-icon>
            <a href="?logout" class="btn btn-link" style= "text-decoration: none;
            color: white;
            font-family: 'Montserrat';"><ion-icon name="log-out-outline"></ion-icon></a> -->

        </div>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Dropdown Menu</title> -->
    <style>
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-button {
            /* background-color: #444; */
            background-color: rgb(76, 121, 52, 1);
            border: none;
            color: white;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            border-radius: 5px;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #444;
            min-width: 160px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 5px;
        }
        .dropdown-content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }
        .dropdown-content a:hover {
            background-color: #555;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>
<body>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>