<html> <!--fix error messages-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
include_once "dbconnect.php";
session_start();

if(isset($_POST['l_username_or_l_email'])){
    $usrnm_or_email = $_POST['l_username_or_l_email'];
    $psswrd = $_POST['l_password'];
    $sql_check_userstable = "SELECT *
                                FROM `users`
                                    WHERE (`username` = '$usrnm_or_email' 
                                        OR `email` = '$usrnm_or_email') 
                                    AND `password` = '$psswrd'";

    $sql_result = mysqli_query($conn,$sql_check_userstable);
    $count_result = mysqli_num_rows($sql_result);
    
    if($count_result == 1){
        //existing user
        $row = mysqli_fetch_assoc($sql_result);
        
        //create session variables
        $_SESSION['users_info_id'] = $row['user_id'];
        $_SESSION['users_fullname'] = $row['fullname'];
        $_SESSION['users_username'] = $row['username'];
        $_SESSION['users_password'] = $row['password'];
        $_SESSION['users_email'] = $row['email'];  
        $_SESSION['users_contact_number'] = $row['contact_number'];
        $_SESSION['users_address'] = $row['address'];
        $_SESSION['users_gender'] = $row['gender'];
        $_SESSION['users_user_type'] = $row['user_type'];
       
        if($row['user_type'] == 'A'){
            header("location: admin");
            exit();
        }
        else if($row['user_type'] == 'C'){
            header("location: common_user");
            exit();
        }
        else{
            header("location: index.php?error=user_not_found");
            exit();
        }
    }
    else{
       header("location: login.php?error= Invalid email/username or password. Please try again.");
       exit();
    }
}
?>
    
</body>
</html>