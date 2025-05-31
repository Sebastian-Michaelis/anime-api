<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: DELETE");

require_once(__DIR__ . "/function.php");

$rawData = file_get_contents("php://input");
$rawData = json_decode($rawData, true);

if (deleteRecord($rawData['data-id']))
    echo true;
?>