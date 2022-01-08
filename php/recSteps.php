<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers: X-Requested-With,Origin,Content-Type,Cookie,Accept');

$user = "root";
$pass = "";
$data = json_decode(file_get_contents('php://input'), true);
$dbh = new PDO("mysql:host=localhost;dbname=fridge", $user, $pass);
$btn = $_POST['btn'] ?? '';

if (!$btn) {
  foreach ($data as $item) {
    $name = $item['name'];
  }
  $stmt = $dbh->query("SELECT rec_step_image, description FROM recipe_steps WHERE recipes_id in (SELECT recipes_id FROM recipes WHERE name = '" . $name . "')");
  $info = $stmt->fetchAll(PDO::FETCH_ASSOC);
  print_r(json_encode($info));
}
