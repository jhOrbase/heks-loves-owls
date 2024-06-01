<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.css"> 
    <link rel="stylesheet" href="style/signup.css">
    <title>Wristique Watches - SIGN UP</title>
</head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="top-border"></div>
                    <div class="additional-border">
                         <span style="font-weight: bold;">
                            WRISTIQUE</span><br>WATCHES
                        </div>
        <?php
            if(isset($_GET['error'])){
                echo "Error:" . $_GET['error']; 
            }
        ?>
        <div class="container-form">
            <div class="form-container col-md-6 col-xs-12">
                <div class="box form-box">
                    <form action="process_signup.php" method="post">
                            <header style= "color: rgb(18, 70, 18); text-align: center;">Sign Up</header>
                                    <div class="field input">
                                        <label for="" class="form-label">Fullname</label>
                                            <input name="s_fullname" type="text" class="form-control" autocomplete="on" required> 
                                                </div>
                                            <div class="field input">
                                        <label for="" class="form-label">Username</label>
                                    <input name="s_username" type="text" class="form-control" autocomplete="on" required> 
                                </div>
                                    <div class="field input">
                                        <label for="" class="form-label">Password</label>
                                            <input name="s_password" type="password" class="form-control" autocomplete="off" required>
                                                </div>
                                            <div class="field input">
                                        <label for="" class="form-label">Confirm Password</label>
                                    <input name="s_conf_password" type="password" class="form-control" autocomplete="off" required>
                                </div>
                                    <div class="field input">
                                        <label for="" class="form-label">Email</label>
                                            <input name="s_email" type="text" class="form-control" autocomplete="on" required> 
                                                </div>
                                            <div class="field input">
                                        <label for="" class="form-label">Contact Number</label>
                                    <input name="s_contact_number" type="text" class="form-control" autocomplete="on" required> 
                                </div>
                                    <div class="field input">
                                        <label for="" class="form-label">Address</label>
                                            <input name="s_address" type="text" class="form-control" autocomplete="on"required>
                                                </div>
                                            <div class="field input">
                                        <label for="" class="form-label">Gender</label>
                                    <select class="form-select" name="s_gender" id="" class="form-control"required>
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                    <option value="X">Rather Not Say</option>
                                        </select>
                                            </div>     
                                        <div class="field">    
                                    <input type="submit" class="btn" value="Register">
                                </div>
                        <div class="links">
                            Already a member? <a href="login.php">Log In</a>
                        </div>
                    </form>
                </div> 
            </div>           
            <div class="image-container col-md-6 col-xs-12">        
                <img class="image" src="webpics/login.jpg" alt="Watch Image1"> 
            </div> 
        </div>
            </div>
        </div>
        <div class="bottom-border"></div> 
    </body>
        <script src="js/bootstrap.js"></script>
</html>