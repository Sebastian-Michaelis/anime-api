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
                "header"  => "Content-Type: application/json\r\n",
                "method"  => "POST",
                "content" => json_encode($data)
            ]
        ];
        $context = stream_context_create($options);
        $response = file_get_contents("http://localhost:84/insert-record.php", false, $context);
        
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
        <div class="signout-btn">
            <form method="POST">
                <button class="btn btn-outline-danger" name="logout">
                    <i class="zmdi zmdi-power"></i> Sign Out
                </button>
            </form>
        </div>

        <div class="form-section">
            <h3 class="mb-4 text-center text-primary"><i class="zmdi zmdi-quote"></i> Anime Quote Manager</h3>
            <form method="POST">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="animeTitle" class="form-label"><i class="zmdi zmdi-slideshow"></i>Anime
                            Title</label>
                        <input type="text" class="form-control" name="title" id="animeTitle" placeholder="Enter anime title">
                        <?= isset($err['title']) ? ' <span class="alert alert-danger py-2 mt-2 d-inline-block w-100 mb-0" role="alert"><i class="zmdi zmdi-alert-circle me-2"></i>' . $err['title'] . '</span>' : '' ?>

                    </div>
                    <div class="col-md-6">
                        <label for="saidBy" class="form-label"><i class="zmdi zmdi-account"></i>Said By</label>
                        <input type="text" class="form-control" name="saidBy" id="saidBy" placeholder="Who said it?">
                        <?= isset($err['saidBy']) ? ' <span class="alert alert-danger py-2 mt-2 d-inline-block w-100 mb-0" role="alert"><i class="zmdi zmdi-alert-circle me-2"></i>' . $err['saidBy'] . '</span>' : '' ?>

                    </div>
                </div>
                <div class="mb-3">
                    <label for="quote" class="form-label"><i class="zmdi zmdi-comment-text"></i>Quote</label>
                    <textarea class="form-control" id="quote" name="quote" rows="3" placeholder="Enter the quote"></textarea>
                    <?= isset($err['quote']) ? ' <span class="alert alert-danger py-2 mt-2 d-inline-block w-100 mb-0" role="alert"><i class="zmdi zmdi-alert-circle me-2"></i>' . $err['quote'] . '</span>' : '' ?>
                </div>
                <button type="submit" name="submit" class="btn btn-primary w-100"><i class="zmdi zmdi-plus-circle"></i>
                    Submit
                    Quote</button>
            </form>
        </div>

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
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Naruto</td>
                        <td>Hard work is worthless for those that don’t believe in themselves.</td>
                        <td>Naruto Uzumaki</td>
                        <td class="text-center">
                            <button class="btn-icon"><i class="zmdi zmdi-edit zmdi-hc-fw"></i></button>
                            <button class="btn-icon text-danger"><i class="zmdi zmdi-delete zmdi-hc-fw"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Attack on Titan</td>
                        <td>If you win, you live. If you lose, you die. If you don’t fight, you can’t win!</td>
                        <td>Eren Yeager</td>
                        <td class="text-center">
                            <button class="btn-icon"><i class="zmdi zmdi-edit zmdi-hc-fw"></i></button>
                            <button class="btn-icon text-danger"><i class="zmdi zmdi-delete zmdi-hc-fw"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>One Piece</td>
                        <td>Power isn’t determined by your size, but the size of your heart and dreams!</td>
                        <td>Luffy</td>
                        <td class="text-center">
                            <button class="btn-icon"><i class="zmdi zmdi-edit zmdi-hc-fw"></i></button>
                            <button class="btn-icon text-danger"><i class="zmdi zmdi-delete zmdi-hc-fw"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <nav>
                <ul class="pagination" data-total="<?= $total ?>">
                    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                    <?php
                    for ($x = 1; $x <= $total; $x++) {
                        ?>
                        <li class="page-item "><button class="page-link" data-page="<?= $x ?>"><?= $x ?></button></li>
                    <?php } ?>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>