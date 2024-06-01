<?php
    include_once "../dbconnect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
        <?php
            $sql_get_users_info = "SELECT *FROM `users` 
                                    WHERE user_type = 'C';";
            $sql_execute_results = mysqli_query($conn,$sql_get_users_info);    
                
        ?>
        <table class="table table-striped">
                <tr>
                    <th>Fullname</th>
                    <th>Username</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Status</th>
                </tr>
            <?php
                while($row = mysqli_fetch_assoc($sql_execute_results)){ ?>
                    <tr>
                        <td><?php echo ucwords ($row['fullname']);?></td>
                        <td><?php echo $row['username'];?></td>
                        <td><?php echo $row['gender'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo ucwords ($row['address']);?></td>
                        <td><?php echo $row['user_status'];?></td>
                    </tr>      
            <?php } ?>
        </table>
</body>
</html>