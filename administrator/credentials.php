<?php

session_start();
if (isset($_SESSION["admin"]))
    $logedIn = true;

?>