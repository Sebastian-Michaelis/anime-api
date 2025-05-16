<?php
echo convert_uudecode(")861M:6XT,S(Q `");;
// session_start();

require_once(__DIR__ . "/../function.php");
require_once(__DIR__ . "/../global.php");

$rules = [
    "username" => [
        "required" => true,
        "minlength" => 4,
        "maxlength" => 100
    ],
    "password" => [
        "required" => true,
        "minlength" => 4
    ]
];

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $err = validateFields($_POST, $rules);
    // print_r($err);
    if (empty($err)) {
        if (verifyUser($_POST["username"], $_POST["password"])) {
            $_SESSION['admin'] = true;
            header("location: index.php");
        } else {
            // echo 'hello';
            $err['invalid'] = 'Invalid Username or Password';
        }
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administrator</title>
    <link rel="stylesheet" href="assets/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <div class="main">

        <!-- Sing in  Form -->
        <section class="sign-in my-5">
            <div class="container">

                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="assets/images/signin-image.jpg" alt="sing up image"></figure>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <?= isset($err['invalid']) ? ' <span class="alert alert-danger py-2 mt-2 d-inline-block w-100" role="alert"><i class="zmdi zmdi-alert-circle me-2"></i>' . $err['invalid'] . '</span>' : '' ?>

                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="username" placeholder="Username"
                                    value="<?= isset($_POST['username']) ? $_POST['username'] : '' ?>">
                                <?= isset($err['username']) ? ' <span class="alert alert-danger py-2 mt-2 d-inline-block w-100 mb-0" role="alert"><i class="zmdi zmdi-alert-circle me-2"></i>' . $err['username'] . '</span>' : '' ?>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password"
                                    value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>">
                                <?= isset($err['password']) ? ' <span class="alert alert-danger py-2 mt-2 d-inline-block w-100 mb-0" role="alert"><i class="zmdi zmdi-alert-circle me-2"></i>' . $err['password'] . '</span>' : '' ?>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term">
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember
                                    me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/main.js"></script>


</body>

</html>