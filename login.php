<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.css"> 
    <link rel="stylesheet" href="style/login.css">
    <title>Wristique Watches - LOG IN</title>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="top-border"></div>
                <div class="additional-border">
                    <span style="font-weight: bold;">
                        WRISTIQUE</span><br>WATCHES
                    </div>              
                <div class="container-form">
            <div class="form-container">
        <div class="box form-box">
        <?php
        if(isset($_GET['error'])){
            echo "Error:" . $_GET['error']; // Displaying the error message if it exists
        }
        ?>
        <form action="process_login.php" method="post">
            <header style= "color: rgb(18, 70, 18); text-align: center;">Log In</header>
                <div class="field input">
                    <label for="" class="form-label">Username/Email</label>
                        <input name="l_username_or_l_email" type="text" class="form-control" autocomplete="on" required> 
                            </div>
                            <div class="field input">
                        <label for="" class="form-label">Password</label>
                    <input name="l_password" type="password" class="form-control" autocomplete="off" required>
                </div>  
                    <div class="field">  <!--<input type="submit" class="btn btn-success"> -->                               
                        <input type="submit" class="btn" value="Submit">
                        </div>
                    <div class="links">
                Don't have an account? <a href="signup.php">Signup</a>
            </div> 
        </div> 
            </div>
            <div class="image-container">
                <img class="image" src="webpics/login.jpg" alt="Watch Image1">
                    <!--Cess palitan mo nalang image-->
                    </div>
                </div>
            <div class="bottom-border"></div>
        </div>
    </div>
        </form>
</body>
        <script src="js/bootstrap.js"></script>
</html>