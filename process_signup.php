<?php

include_once "dbconnect.php";

$fullname = $_POST['s_fullname'];
$usrnm = $_POST['s_username']; 
$psswrd = $_POST['s_password']; 
$conf_psswrd = $_POST['s_conf_password']; 
$contact = $_POST['s_contact_number']; 
$address = $_POST['s_address']; 
$gender = $_POST['s_gender'];
$email = $_POST['s_email'];

                //check if the password matches the confirmed password
                    function chk_pass($p1, $p2) {
                        return ($p1 == $p2) ? 1:0;
                    }
                    if(!chk_pass($psswrd, $conf_psswrd)){
                    header("location: signup.php?error= Password mismatch");
                    die;
                    }

                //veryfying the uniqueness of the email
                    $verify_query = mysqli_query($conn, "SELECT email FROM users WHERE email='$email'");
                    // Checking if there are any rows returned by the query (i.e., if the email already exists)
                    if(mysqli_num_rows($verify_query) != 0) {
                        header("location: signup.php?error= Sorry, the email you entered is already registered with an existing acccount. Please try another one.");
                        die;
                    }        

    //This will check if the username is already existing
    $sql_chk_user = "SELECT user_id FROM users
                    WHERE `username` = '$usrnm'";
    $sql_result = mysqli_query($conn, $sql_chk_user); //this will execute the SQL above.
    $count_result = mysqli_num_rows($sql_result); //This will count the result of the above SQL

    if($count_result > 0){
        //if user already exists = error message
        header("location: signup.php?error= You already have an account! Login to continue.");
    }
    else {
        //user can register
        $sql_new_user = "INSERT INTO `users`
                        (`fullname`, `username`, `password`, `contact_number`, `address`, `gender`, `email`)
                        VALUES
                        ('$fullname','$usrnm','$psswrd','$contact','$address','$gender', '$email')
                        ";
        $execute_query = mysqli_query($conn,$sql_new_user);
        
        if(!$execute_query){
        header("location: signup.php?error=Insert_Failed");
        }
        else{
        header("location: login.php?msg=Successfully_registered");
        }  
    }
?>