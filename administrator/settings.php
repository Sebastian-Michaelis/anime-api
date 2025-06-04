<?php

require_once("../global.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $image = isset($_FILES['siteImage']) ? $_FILES['siteImage'] : '';
    if (!empty($_FILES['siteImage']['name']))
        updateSiteImage($image);
    if (!empty($_POST['siteName']))
        updateSiteName($_POST['siteName']);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Site Settings</title>
    <link rel="icon" href="<?=$siteImage?>">
    <!-- Bootstrap 5 CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/material-design-iconic-font@2.2.0/dist/css/material-design-iconic-font.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="assets/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="bg-light py-5">

    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Site Settings</h4>
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data">
                    <!-- Site Name -->
                    <div class="mb-3">
                        <label for="siteName" class="form-label">Site Name</label>
                        <input type="text" class="form-control" id="siteName" name="siteName"
                            placeholder="Enter your site name" value="<?= isset($siteName) ? $siteName : '' ?>">
                    </div>

                    <!-- Site Image -->
                    <div class="mb-3">
                        <label for="siteImage" class="form-label">Site Image (Logo or Banner)</label>
                        <input class="form-control" type="file" id="siteImage" name="siteImage" accept="image/*">
                    </div>

                    <!-- Image Preview -->
                    <div class="text-center mb-3">
                        <div class="preview-box shadow-sm rounded-3 overflow-hidden"
                            style="width: 150px; height: 150px;">
                            <img id="preview" src="<?= isset($siteImage) ? $siteImage : '' ?>"
                                class="w-100 h-100 object-fit-cover" style="transition: opacity 0.3s ease;">
                        </div>
                        <small class="text-muted d-block mt-2">Image preview updates as soon as you select a
                            file</small>
                    </div>

                    <!-- Submit -->
                    <button type="submit" class="btn btn-primary">Save Settings</button>
                </form>

            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>