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
        // Array products
        if (count($item['rec']) > 1) {
            $rec = '"' . implode('", "', $item['rec']) . '"';
        } elseif (count($item['rec']) === 1) {
            $rec = '"' . implode('', $item['rec']) . '"';
        } else {
            $rec = '';
        }

        // Array limits
        if (count($item['lim'])) {
            $lim = implode('", "', $item['lim']);
        } else {
            $lim =  '';
        }

        // String time
        $time = $item['time'];
    }
    if (strlen($rec) != 0) {
        $sql = "SELECT `name`, `cooking_time`, COUNT(prodinrec.product_id) AS matchs, `image`, `count_prod` from recipes, recipe_images, prodinrec WHERE ";

        if (strlen($lim) === 0) {
            $sql .= " prodinrec.product_id IN (SELECT product_id FROM products WHERE product_name IN (" . $rec . ")) ";
        } elseif (strlen($lim) != 0) {
            $sql .= " prodinrec.product_id IN (SELECT product_id FROM products WHERE product_name IN (" . $rec . ") and product_id not in (select distinct(product_id) from prodinlim where limit_id in (" . $lim . "))) ";
        }

        if (strlen($time) != 0) {
            $sql .= " and cooking_time " . $time;
        } else {
            $sql .= " and cooking_time = cooking_time ";
        }
        $sql .= " and prodinrec.recipes_id = recipes.recipes_id and prodinrec.recipes_id = recipe_images.recipes_id GROUP BY `name` ORDER BY `matchs` DESC;";
    }


    if (strlen($rec) === 0) {
        $sql = "SELECT `name`, `cooking_time`, `image` from recipes, recipe_images WHERE ";

        if (strlen($lim) != 0) {
            $sql .= " recipes.recipes_id in (select recipes_id from prodinrec where product_id in(select distinct(product_id) from prodinlim where limit_id in (" . $lim . "))) ";
        } elseif (strlen($lim) === 0) {
            $sql .= " recipes.recipes_id = recipes.recipes_id ";
        }

        if (strlen($time) != 0) {
            $sql .= " and cooking_time " . $time;
        } else {
            $sql .= " and cooking_time = cooking_time ";
        }
        $sql .= " and recipes.recipes_id = recipe_images.recipes_id;";
    }
    $stmt = $dbh->query($sql);
    $info = $stmt->fetchAll(PDO::FETCH_ASSOC);
    print json_encode($info);
}
