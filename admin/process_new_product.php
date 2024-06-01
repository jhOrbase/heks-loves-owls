<?php
if(isset($_POST['n_pdt_name'])){ //trap
    include_once "../dbconnect.php";

    $uploadOk = 1;
    $target_dir = "../webpics/";
    
    $target_file = $target_dir . basename($_FILES["n_pdt_img"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    $check_img = getimagesize($_FILES["n_pdt_img"]["tmp_name"]);
    
    if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
    } else {
              echo "File is not an image.";
              $uploadOk = 0;
    }
    
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
    }
   
    // Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
 // echo "Sorry, your file was not uploaded.";
  header("location: index.php?insert_status=99");
// if everything is ok, try to upload file
} 
else {
  if (move_uploaded_file($_FILES["n_pdt_img"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["n_pdt_img"]["name"])). " has been uploaded.";
  } 
  else {
    //echo "Sorry, there was an error uploading your file.";
    header("location: index.php?insert_status=99");
  }
}
    
    $db_filename = basename($_FILES["n_pdt_img"]["name"]);
    $pdt_name = $_POST['n_pdt_name']; 
    $pdt_description = $_POST['n_pdt_description'];
    $pdt_price = $_POST['n_pdt_price'];
    
    $sql_insert_product = "INSERT INTO `products`
                    (`pdt_name`, `pdt_description`, `pdt_price`, `pdt_img`)
                      VALUES
                    ('$pdt_name','$pdt_description','$pdt_price','$db_filename');";

    $execute_query= mysqli_query($conn, $sql_insert_product);
    
    if($execute_query){
        //echo "Data inserted";   
        header("location: ../admin/index.php?manageproducts&insert_status=1");
        //header("location: index.php?manageitems&insert_status=1");
        exit;
    }
}
else{
    //header("location: ../admin/index.php?you_cant_be_here");
    header("location: index.php?you_cant_be_here");
    exit;
}
