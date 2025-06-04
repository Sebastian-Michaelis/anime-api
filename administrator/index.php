<?php

require_once(__DIR__ . "/credentials.php");
require_once(__DIR__ . "/../global.php");
if (!$logedIn)
    header("location: login.php");

$limit = 4;
$total = ceil(getRecordCount() / $limit);

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
}
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
    $rules = [
        'title' => [
            'required' => true,
            'minlength' => 2
        ],
        'saidBy' => [
            'required' => true,
            'minlength' => 2
        ],
        'quote' => [
            'required' => true,
            'minlength' => 5
        ]
    ];
    $err = validateFields($_POST, $rules);
    if (empty($err)) {
        $data = [
            "title" => $_POST['title'],
            "saidBy" => $_POST['saidBy'],
            "quote" => $_POST['quote'],
        ];

        $options = [
            "http" => [
                "header" => "Content-Type: application/json\r\n",
                "method" => "POST",
                "content" => json_encode($data)
            ]
        ];
        $context = stream_context_create($options);
        $response = file_get_contents("http://localhost:84/insert-record.php", false, $context);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $rules = [
        'updateTitle' => [
            'required' => true,
            'minlength' => 2
        ],
        'updateSaidBy' => [
            'required' => true,
            'minlength' => 2
        ],
        'updateQuote' => [
            'required' => true,
            'minlength' => 5
        ]
    ];
    $err = validateFields($_POST, $rules);
    if (empty($err)) {
        $data = [
            "id" => $_POST["record"],
            "title" => $_POST["updateTitle"],
            "saidBy" => $_POST["updateSaidBy"],
            "quote" => $_POST["updateQuote"]
        ];
        $options = [
            "http" => [
                "header" => "Content-Type: application/json\r\n",
                "method" => "PATCH",
                "content" => json_encode($data)
            ]
        ];
        $context = stream_context_create($options);
        $response = file_get_contents("http://localhost:84/update-record.php", false, $context);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=isset($siteName)?$siteName:'Title'?></title>
    <link rel="icon" href="<?=$siteImage?>">
    <link rel="stylesheet" href="assets/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container">


        <div class="signout-btn">
            <div class="dropdown text-end">
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="profileDropdown"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="<?=$siteImage?>" alt="profile" width="40" height="40"
                        class="rounded-circle">
                </a>
                <ul class="dropdown-menu text-small" aria-labelledby="profileDropdown">
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="/administrator/settings.php">
                            <i class="zmdi zmdi-settings me-2"></i> Settings
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <form method="POST">
                            <button type="submit" name="logout"
                                class="dropdown-item w-100 text-danger d-flex align-items-center">
                                <i class="zmdi zmdi-power me-2"></i> Sign Out
                            </button>
                        </form>
                    </li>
                </ul>


            </div>


        </div>

        <?php require "insert-form.php" ?>

        <div class="table-section">
            <h4 class="mb-3 text-secondary"><i class="zmdi zmdi-format-list-numbered"></i> Submitted Quotes</h4>
            <table class="table table-bordered table-striped align-middle">
                <thead>
                    <tr>
                        <th>Serial No</th>
                        <th>Anime Title</th>
                        <th>Quote</th>
                        <th>Said By</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>

            <nav>
                <ul class="pagination" data-total="<?= $total ?>">
                </ul>
            </nav>
        </div>
    </div>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    <?php require "update-modal.php" ?>
</body>

</html>