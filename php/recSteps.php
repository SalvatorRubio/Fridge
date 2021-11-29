<?php
 
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers: X-Requested-With,Origin,Content-Type,Cookie,Accept');
 

$servername = "localhost";
$username = "root";
$password = "";
$database = "fridge";
$data = json_decode(file_get_contents('php://input'), true);
$conn = new mysqli($servername, $username, $password, $database);

if(!$btn) {
    foreach ($data as $item) {
        $sql = " SELECT rec_step_image, description FROM recipe_steps WHERE recipes_id in (SELECT recipes_id FROM recipes WHERE name = '".$item['name']."'); ";
        print_r($sql);
        mysqli_query($conn, $sql);
    }
    $result1=$conn->query($sql);
    $type_array = array(); 
    while($row = mysqli_fetch_array($result1)) {
        $type_array = array(
            'rec_step_image' => $row['rec_step_image'],
            'description' => $row['description']
        );
        print_r( json_encode($type_array, JSON_UNESCAPED_UNICODE));
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        };
    }
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    };
}


mysqli_close($conn);


?>