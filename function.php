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

    $query = "SELECT * FROM settings WHERE title='quoteId'";
    $res = mysqli_fetch_assoc(mysqli_query($conn, $query));
    if (date("Y-m-d") == $res['currentDate'])
        return getRecordById($res['holds']);

    return getRecordById(updateQuote());
}

function updateQuote()
{
    global $conn;
    $res = getRandomQuote();
    $newDate = date('Y-m-d');
    // echo $newDate;
    $query = "UPDATE  settings SET currentDate='{$newDate}',holds='{$res['id']}' WHERE title='quoteId'";
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
    $res = mysqli_query($conn, "SELECT COUNT(1) as count FROM anime");
    return mysqli_fetch_assoc($res)['count'];
}

function deleteRecord($id)
{
    global $conn;
    if (mysqli_query($conn, "DELETE FROM anime WHERE id={$id}"))
        return true;
    return false;
}

function insertRecord($data)
{
    global $conn;
    $data = implode("','", $data);
    $res = mysqli_query($conn, "INSERT INTO anime(title,saidBy,quote)  VALUES ('{$data}')");
    if ($res)
        return true;
    return false;
}

function updateRecord($data)
{
    global $conn;
    $values = '';
    $id = array_shift($data);
    array_walk($data, function ($value, $key) use (&$values) {
        $values .= "$key= '$value',";
    });
    $values = substr($values, 0, -1);
    echo "UPDATE anime SET $values WHERE id=$id ";
    mysqli_query($conn, "UPDATE anime SET $values WHERE id=$id ");
}

function exportSettings()
{
    global $conn;
    $res = mysqli_query($conn, "SELECT * FROM SETTINGS");
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
}

function updateSiteImage($image)
{
    global $conn;
    global $siteImage;
    // print_r($image);
    if (isset($siteImage))
        unlink($siteImage);


    $uploadDir =  'assets/images/';  

    $filename = uniqid(mt_rand(), true) . strrchr($image['name'], '.');

    $fullPath = $uploadDir . $filename;

    if (move_uploaded_file($image['tmp_name'], $fullPath)) {
        mysqli_query($conn, "UPDATE settings SET holds='$fullPath' WHERE title='siteImage'");
        $siteImage=$fullPath;
    }
}

function updateSiteName($name)
{
    global $conn;
    global $siteName;
    mysqli_query($conn, "UPDATE settings SET holds='$name' WHERE title='siteName'");
    $siteName=$name;
}

?>