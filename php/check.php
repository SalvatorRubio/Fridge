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
    $btn = '';
    if (isset($_POST['btn'])){
        $btn = $_POST['btn'];
    }

    if(!$btn) {
        foreach ($data as $item) {
            
            if(!empty($item['rec'])) {
                $rec = '"' . implode('", "', $item['rec']) . '"';
            } else {
                $rec = '';
            }

            if(!empty($item['lim'])) {
                $lim = '"' . implode('", "', $item['lim']) . '"';
            } else {
                $lim = '';
            }

            if(!empty($item['time'])) {
                $time = '' . implode(', ', $item['time']) . '';
            } else {
                $time = '';
            }

            if(trim($rec) != '') {
                $sql = "SELECT `name`, `cooking_time`, COUNT(prodinrec.product_id) AS matchs, `image` from recipes, recipe_images, prodinrec WHERE "; 

                if(trim($lim) === '') {
                    $sql .= " prodinrec.product_id IN (SELECT product_id FROM products WHERE product_name IN (".$rec.")) ";
                } elseif(trim($lim) != '') {
                    $sql .= " prodinrec.product_id IN (SELECT product_id FROM products WHERE product_name IN (".$rec.") and product_id not in (select distinct(product_id) from prodinlim where limit_id in (".$lim."))) ";
                }

                if(trim($time) != '') {
                    $sql .= " and cooking_time ".$time. " ";
                } else {
                    $sql .= " and cooking_time = cooking_time ";
                }
                $sql .= " and prodinrec.recipes_id = recipes.recipes_id and prodinrec.recipes_id = recipe_images.recipes_id GROUP BY `name` ORDER BY `matchs` DESC;";

            }

            if(trim($rec) === '') {
                $sql = "SELECT `name`, `cooking_time`, `image` from recipes, recipe_images WHERE "; 

                if(trim($lim) != '') {
                    $sql .= " recipes.recipes_id in (select recipes_id from prodinrec where product_id in(select distinct(product_id) from prodinlim where limit_id in (".$lim."))) ";
                } elseif(trim($lim) === '') {
                    $sql .= " recipes.recipes_id = recipes.recipes_id ";
                }

                if(trim($time) != '') {
                    $sql .= " and cooking_time ".$time. " ";
                } else {
                    $sql .= " and cooking_time = cooking_time ";
                }
                $sql .= " and recipes.recipes_id = recipe_images.recipes_id;";
            }

            if(trim($rec) != '' && trim($lim) === '') {
                // $sql .= " recipes.recipes_id in (SELECT recipes_id FROM prodinrec WHERE product_id in (SELECT products.product_id from products WHERE product_name in (".$rec."))) ";
            }
            // elseif (trim($rec) != '' && trim($lim) != '') {
            //     $sql .= " recipes.recipes_id in (SELECT recipes_id FROM prodinrec WHERE product_id in (SELECT products.product_id from products WHERE product_name in (".$rec.")"; 
            //     $sql .= " and product_id not in(select distinct(product_id) from prodinlim where limit_id in (".$lim."))))";
            // } elseif(trim($rec) === '' && trim($lim) === '') {
            //     $sql .= " recipes.recipes_id = recipes.recipes_id ";
            // }

            // if(trim($lim) != '' && trim($rec) === '') {
            //     $sql .= " recipes.recipes_id in (select recipes_id from prodinrec where product_id in(select distinct(product_id) from prodinlim where limit_id in (".$lim."))) ";
            // }


            // if(trim($time) != '') {
            //     $sql .= " and cooking_time ".$time. " ";
            // } else {
            //     $sql .= " and cooking_time = cooking_time ";
            // };
            mysqli_query($conn, $sql);
        }
        $result1=$conn->query($sql);
        $type_array = array(); 

        while($row = mysqli_fetch_array($result1)) {
            $type_array = array(
                'name' => $row['name'],
                'image' => $row['image'],
                'time' => $row['cooking_time'],
                'matchs' => $row['matchs']
            );
            print_r( json_encode($type_array, JSON_UNESCAPED_UNICODE));
        }
    };

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
};

mysqli_close($conn);


?>