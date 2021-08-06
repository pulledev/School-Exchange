<!doctype html>
<html lang="de">

<?php
$laender = ["SH","hh","mv","be","N","b","br","BA","s","SA","Sl","nw","h","t","rp","BW="];
$zahl = rand(0,15);

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Welches Bundesland wird eleminiert?</h1>
<div>
    <?php

    echo $laender[$zahl];
    ?>
</div>
</body>
</html>
