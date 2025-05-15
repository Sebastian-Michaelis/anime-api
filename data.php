<?php
// header("Content-Type:json/application");
// header('Access-Control-Allow-Origin: *');
// header("Access-Control-Allow-Methods: GET");
require_once(__DIR__."/function.php");

echo json_encode(getRecords());

?>