<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT");
header("Access-Control-Allow-Headers: Content-Type");


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fridge";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
};
$sql = "SELECT product_name FROM products ";

  $result=$conn->query($sql) ;
  while($row = mysqli_fetch_assoc($result))  {
    $f = $row['product_name']. ',';
    echo $f;
  };
$conn->close();
?>