<?php

include __DIR__ . "/../app/functions.php";
$userName = "Raas/Joya (Gsus)";
$userId = 1;
$characterJSON = '../../app/JS/characters.json';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:site_name" content="Vengeful Scars">
    <meta property="og:title" content="<?= $meta_title; ?>" />
    <meta property="og:description" content="<?= $meta_desc; ?>" />
    <meta property="og:image" content="<?= $meta_img; ?>" />
    <meta name="twitter:image" content="<?= $meta_img; ?>" />
    <meta name="twitter:card" content="<?= $meta_card; ?>" />
    <meta name="twitter:image:alt" content="<?= $meta_card_alt; ?>">
    <meta propety="og:url" content="https://vengefulscars.com/" />
    <link rel="stylesheet" href="<?= $style; ?>">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
    <link rel='icon' type='image/png' href='https://vengefulscars.com/img/favicon.png'>
    <title><?= $page_title; ?></title>
</head>

<body>
    <div id="wrapper">