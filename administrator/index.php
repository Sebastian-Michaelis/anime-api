<?php

require_once(__DIR__ . "/credentials.php");
require_once(__DIR__ . "/../function.php");
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
                "method" => "POST",
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
    <title>Anime Quote Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link
        href="https://cdn.jsdelivr.net/npm/material-design-iconic-font@2.2.0/dist/css/material-design-iconic-font.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="assets/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container">

        <div class="">

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- The WordPress Menu goes here -->
            <div id="navbarNavDropdown" class="collapse navbar-collapse">
                <ul id="main-menu" class="navbar-nav">
                    <li class="nav-item"><a href="#" class="nav-link">Menu Item 1</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Menu Item 2</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Menu Item 3</a></li>
                </ul>
            </div>
            <div class="signout-btn">

                <form method="POST">
                    <button class="btn btn-outline-danger" name="logout">
                        <i class="zmdi zmdi-power"></i> Sign Out
                    </button>
                </form>
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
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/main.js"></script>
        <?php require "update-modal.php" ?>
</body>

</html>