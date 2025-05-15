<?php

require_once(__DIR__."/global.php");

function getRecordById($id)
{
    global $conn;
    $query="SELECT * FROM anime WHERE id = {$id}";
    $result=mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
}

?>