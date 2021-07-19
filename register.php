<!doctype html>

<html lang="de">
<head>
    <meta charset="utf-8">

    <title>NWT Tausch</title>

    <meta name="Paul Treier" content="Exchange Platform">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,500;1,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styleregiste.css">
    <meta name="viewport" content="width=480px, initial-scale=1.0">
</head>

<body>
<div id="sidesquare"></div>
<div id="codesquare"></div>

<div class="headlinec">
    <h1 id="headline">Registrieren</h1>
</div>
<div class="login">
    <form id="qeingabe" action="" method="post">
        <input type="text" name="username" placeholder="Benutzername" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Passwort" required>
        <input type="text" name="code" placeholder="Zugangscode" required>
        <button type="submit" name="submit"> Anmelden</button>
        <div class="">

        </div>
    </form>
</div>
<div class="sidec">
    <a href="index.php" id="side">zurück</a>
</div>

<?php
require 'db.php';
spl_autoload_register(function ($className) {
    error_log('autoloader:'.$className);
    include 'classes/'.$className.'.php';
});
?><h3 id="success">Dein Konto wurde erstellt!</h3><?php


if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $username = $_POST["username"];
    $code = $_POST["code"];
    $password = $_POST["password"];
    $password = md5($password);

    $searchCode = $db->prepare("SELECT ID FROM register_code WHERE code = ?");
    $searchCode->bind_param("s", $code);
    $searchCode->execute();
    $searchResult = $searchCode->get_result();

    if ($searchResult->num_rows != 0) {
        $absenden = $db->prepare("INSERT INTO user (email,username,code,password) VALUES (?,?,?,?)");
        $absenden->bind_param("ssss", $email, $username, $code, $password);
        $absenden->execute();
        ?><h3 id="success">Dein Konto wurde erstellt!</h3><?php

        $delete = $db->prepare("DELETE FROM codes WHERE code= ? ");
        $delete->bind_param("s", $code);
        $delete->execute();

    } else {
        ?><h3 id="failure">Dein Code war Falsch versuche es erneut!</h3><?php
    }
}
?>
</body>
</html>
