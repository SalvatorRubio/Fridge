<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT");
header("Access-Control-Allow-Headers: Content-Type");


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fridge";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
};

$sql1 = "SELECT limit_name FROM  limits";

  $result1=$conn->query($sql1) ;
  
  while($row = mysqli_fetch_assoc($result1))  {
    
    $f = $row['limit_name']. ',';
    echo $f;
  };
  
$conn->close();
?>