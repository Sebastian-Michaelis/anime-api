<?php

require_once(__DIR__ . "/global.php");

$quote = getQuoteofTheDay();

// echo $siteImage;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?=isset($siteName)?$siteName:'Title'?></title>
    <link rel="icon" href="<?=$siteImage?>">
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/assets/css/style.css" rel="stylesheet" />
</head>

<body>

    <div class="quote-card text-center">
        <div class="quote-title"> QUOTE OF THE DAY</div>

        <p class="quote-text">
            <?= $quote['quote'] ?>
        </p>
        <div class="quote-meta">
            <span class="said-by">—<?= $quote['saidBy'] ?>
            </span>
            <span class="anime-title"> <?= $quote['title'] ?> </span>
        </div>
    </div>

</body>

</html>