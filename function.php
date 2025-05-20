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
    // echo $newDate;
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

function validateFields($data, $rules)
{
    $errors = [];
    foreach ($rules as $field => $fieldRules) {
        $value = trim(isset($data[$field]) ? $data[$field] : '');
        if ($fieldRules['required'] && empty($value))
            $errors[$field] = ucfirst($field) . ' is Required';
        else {
            if (isset($field['email']) && !filter_var($value, FILTER_VALIDATE_EMAIL))
                $errors[$field] = ucfirst($field) . ' not a valid Format';
            if (isset($fieldRules['numeric']) && !is_numeric($value))
                $errors[$field] = ucfirst($field) . ' must be a number';
            if (isset($fieldRules['minlength']) && strlen($value) < $fieldRules['minlength'])
                $errors[$field] = ucfirst($field) . ' must have at least ' . $fieldRules['minlength'] . ' characters';
            if (isset($fieldRules['maxlength']) && strlen($value) > $fieldRules['maxlength'])
                $errors[$field] = ucfirst($field) . ' can have at maximum ' . $fieldRules['maxlength'] . ' characters';
        }
    }
    return $errors;
}

function verifyUser($username, $pass)
{
    global $conn;
    $query = "SELECT * FROM users";
    $res = mysqli_fetch_assoc(mysqli_query($conn, $query));
    if ($res['userName'] == $username && convert_uudecode($res["passcode"]) == $pass)
        return true;
    return false;
}


function getRecordCount()
{
    global $conn;
    $res=mysqli_query($conn,"SELECT COUNT(1) as count FROM anime");
    return mysqli_fetch_assoc($res)['count'];
}


?>