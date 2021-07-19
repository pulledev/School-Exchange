<?php
$current_subject = filter_var($_GET["subject"], FILTER_SANITIZE_STRING);
session_start();
require("../function.php");
?>

    <!doctype html>

    <html lang="de">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <link rel="stylesheet" href="stylindex.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
              rel="stylesheet">
        <link href="https://allfont.net/allfont.css?fonts=league-spartan" rel="stylesheet" type="text/css"/>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,500;1,400&display=swap" rel="stylesheet">
        <title>
            <?php
            if ($current_subject == "informatics") {
                ?>Informatik<?php
            } elseif ($current_subject == "math") {
                ?>Mathe<?php
            } elseif ($current_subject == "science") {
                ?>Naturwissenschaft<?php
            } elseif ($current_subject == "tech") {
                ?>Technik<?php
            } else {
                ?>Test/Fehler<?php
            }

            ?></title></title>
        <link rel="stylesheet" href="stylesubje.css">

    </head>

    <body>


    <div class="container">
        <div class="cover">
            <div class="coverPic"><?php echo whichImage($current_subject, "headpic"); ?></div>
            <div class="coverText"><?php whichText($current_subject, "covertext") ?></div>
        </div>

    </div>
    </body>
    </html>


<?php

?>