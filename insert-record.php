<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");

require_once(__DIR__."/function.php");

$rawData = file_get_contents("php://input");

$data = json_decode($rawData, true);

echo insertRecord(array_values($data));

?>