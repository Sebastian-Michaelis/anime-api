<?php

header("Content-Type: application/json");
header("Acccess-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

require_once(__DIR__ . "/global.php");

$page = getallheaders()['page'];
$limit = getallheaders()['limit'];

$offset=($page-1)*$limit;

$res = mysqli_query($conn, "SELECT * FROM anime LIMIT {$page},{$offset}");

echo json_encode(mysqli_fetch_all($res, MYSQLI_ASSOC));

// echo "SELECT * FROM anime LIMIT {$limit},{$offset}";


?>