<?php
    header("Content-Type: application/json");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Method: DELETE");

    require_once(__DIR__."/function.php");

    $id=getallheaders()['data-id']??null;
    if($id && deleteRecord(($id)))
        echo true;
?>