<?php

require_once(__DIR__ . "/global.php");

function getRecordById($id)
{
    global $conn;
    $query = "SELECT * FROM anime WHERE id = {$id}";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_assoc($result);
}
function getRecords()
{
    global $conn;
    $query = "SELECT * FROM anime";
    $result = mysqli_query($conn, $query);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function getQuoteofTheDay()
{
    global $conn;

    $query = "SELECT * FROM settings WHERE id=1";
    $res = mysqli_fetch_assoc(mysqli_query($conn, $query));
    if (date("Y-m-d") == $res['currentDate'])
        return getRecordById($res['quoteId']);

    return getRecordById(updateQuote());
}
function updateQuote()
{
    global $conn;
    $res = getRandomQuote();
    $newDate = date('Y-m-d');
    echo $newDate;
    $query = "UPDATE  settings SET currentDate='{$newDate}',quoteId={$res['id']}";
    mysqli_query($conn, $query);
    return $res['id'];
}

function getRandomQuote()
{
    global $conn;
    $query = 'SELECT * FROM anime ORDER BY RAND() LIMIT 1';
    return mysqli_fetch_assoc(mysqli_query($conn, $query));
}
?>