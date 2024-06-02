<?php
$servername= "localhost";
$username = "root";
$password = "";  
$database = "wristiquedb";  

/*=======Procedural Style Connection========*/

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected";


/*=============Reference Number==============*/

function gen_order_ref_number($len){

    $alpha_num = array('A','B','C','D','E','F','G','H','I','J',
                       'K','L','M','N','O','P','Q','R','S','T',
                       'U','V','W','X','Y','Z','0','1','2','3',
                       '4','5','6','7','8','9','0');

    $key="";

    for ($i = 0; $i < $len; $i++){
      if($i%2 == 0 && $i > 0){
        $key .= $alpha_num[rand(0,25)];
      }
      else{
        $key .= $alpha_num[rand(26,sizeof($alpha_num)-1)];
      }
    }
    return $key;
}


/*Object-Oriented Style Connection = index.php to sa yt
$con = new mysqli($host, $username, $password, $database);

if($con->connect_error){
    echo $con->connect_error;
}

$sql = "SELECT * FROM users";
$customers = $con->query($sql) or die ($con->error);
$row = $customers->fetch_assoc();

print_r($row);*/

?>
