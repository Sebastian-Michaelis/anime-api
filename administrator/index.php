<?php

require_once(__DIR__ . "/credentials.php");
if (!$logedIn)
    header("location: login.php");  


// print_r( getRecordById(1));

?>