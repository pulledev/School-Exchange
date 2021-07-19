<?php
session_start();
?>
<!doctype html>

<html lang="de">
<head>
    <meta charset="utf-8">
    <title>LogIn</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/styleloginn.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,500;1,400&display=swap" rel="stylesheet">
    <link href="https://allfont.net/allfont.css?fonts=league-spartan" rel="stylesheet" type="text/css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,700;1,100;1,300;1,400;1,900&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<body>

<div class="headc"><d id="head">Anmelden</d></div>

<div class="topnav">
    <d id="headsmartphone">Anmelden</d>
    <a href="index.php" class="icon"><span class="material-icons">arrow_back</span></a>
</div>

<div class="infoc"><b id="info">Melde dich hier an</b></div>

<div class="back_class">
    <a href="index.php" id="back">zurück</a>
</div>

<div class="login_class">
    <form id="login" action="" method="post">
        <input type="text" name="username" placeholder="Benutzername">
        <input type="password" name="password" placeholder="Passwort"><br>
        <button type="submit" name="submit">Anmelden</button>
    </form>
</div>


<?
require ('db.php');
spl_autoload_register(function ($className) {
    error_log('autoloader:'.$className);
    include 'classes/'.$className.'.php';
});

if (isset($_POST["submit"])) {
    $upassword = $_POST["password"];
    $username = $_POST["username"];
    $password = md5($upassword);

    $searchUser = $mysqli->prepare("SELECT ID FROM user WHERE username = ?");
    $searchUser->bind_param("s", $username);
    $searchUser->execute();
    $searchResult = $searchUser->get_result();
    $checkpassword = false;
    $checkusername = false;
    if ($searchResult->num_rows != 0) {
        $checkusername = true;
    } else {
        echo '<div id="wrong">Dieser Benutzername ist falsch</div>';
    }

    $searchPassword = $mysqli->prepare("SELECT ID FROM user WHERE password = ?");
    $searchPassword->bind_param("s", $password);
    $searchPassword->execute();
    $searchResult = $searchPassword->get_result();

    if ($searchResult->num_rows != 0) {
        $checkpassword = true;
    } else {
        echo '<div id="wrong2">Dieses Passwort existiert nicht</div>';
    }

}
if (isset($checkpassword)) {
    if ($checkpassword == true and $checkusername == true) {
        echo '<a href="home.php"id="link">Home</a>';

        $abfrage = $mysqli->query("SELECT * FROM user WHERE ID = 4");

        $_SESSION["user"] = $username;
        $_SESSION["password"] = $upassword;

        $_SESSION["acc"] = true;
        header('Location:load.php');

    }
}
if (isset($_SESSION["noRights"])) {
    if ($_SESSION["noRights"] == true) {
        echo "<h3>Du hast nicht genügend Rechte, melde dich mit einem passendem Acc an</h3>";
    } else {
        $_SESSION["noRights"] = false;
    }
}
?>



</body>
</html>
