<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

require_once(__DIR__ . "/global.php");


$page = isset($_GET['page'])?$_GET['page']:1;
$limit = isset($_GET['limit'])?$_GET['limit']:4;

$offset=($page-1)*$limit;
$res = mysqli_query($conn, "SELECT * FROM (SELECT *,DENSE_RANK() OVER(ORDER BY id DESC) AS serialNo FROM anime LIMIT {$offset},{$limit}) AS temp");

echo json_encode(mysqli_fetch_all($res, MYSQLI_ASSOC));



?>