<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");

require_once(__DIR__ . "/function.php");

if (isset($_GET['quote']))
    echo json_encode(getRecordById($_GET['quote']));
else
    echo json_encode(getRecords());

?>