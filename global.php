<?php

require_once(__DIR__ . "/config.php");

require_once "function.php";

$conn = mysqli_connect(HOSTNAME, USER, PASSWORD, DATABASE);

$settings = exportSettings();

// $siteImage=$settings['siteImage'];
// print_r($settings);

$imageIndex = array_search("siteImage", array_column($settings, "title"));
$nameIndex = array_search("siteName", array_column($settings, "title"));
if (!empty($settings[$imageIndex]['holds']))
    $siteImage = $settings[$imageIndex]['holds'];
if (!empty($settings[$nameIndex]['']))
    $siteName = $settings[$nameIndex]['holds'];

echo $siteImage;

?>