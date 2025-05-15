<?php

require_once(__DIR__."/function.php");

// header("Content-Type:json/application");
// header('Access-Control-Allow-Origin: *');
// header("Access-Control-Allow-Methods: GET");

echo json_encode(getRecordById(1));
?>