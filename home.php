<!DOCTYPE html>
<html lang="de">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="utf-8">
    <title>Home NWT EXchange</title>
    <link rel="stylesheet" href="css/styleho.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,500;1,400&display=swap" rel="stylesheet">
    <link href="https://allfont.net/allfont.css?fonts=league-spartan" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,700;1,100;1,300;1,400;1,900&display=swap" rel="stylesheet">
</head>
<body>
<div class="headc">
    <h1 id="head">Homepage</h1>
</div>


<?php session_start();
spl_autoload_register(function ($className) {
    error_log('autoloader:'.$className);
    include 'classes/'.$className.'.php';
});
?>


<div class="topnav" id="myTopnav">
        <b id="headsmartphone">Homepage</b>
        <a href="easteregg.html" id="easter">E</a>
        <a href="Definitions/index.php" id="defnav">Definitionen</a>
        <a href="load.php" id="aufnav">Aufgaben</a>
        <a href="forum/" id="aufnav">Forum</a>
        <a href="getcodep.php" id="admnav">Admin Panel</a>
        <a href="settings.php" id="setnav">Einstellungen</a>
        <a href="groups/index.php">Klassen</a>
        <a href="logout.php" id="outnav">Abmelden</a>
        <a href="javascript:void(0);" class="icon" onclick="openMenu()">
            <i class="fa fa-bars"></i>
        </a>
</div>



<?php
require("function.php");
if ($_SESSION["acc"] != true) {
    header("Location:login.php");
}?>
<div id="welcome" >Willkommen zurück, <?php echo $_SESSION["user"]; ?>!</div>

<?php
$rank = searchData("username", $_SESSION["user"], "rank");
$_SESSION["rank"] = $rank;

$email = searchData("username", $_SESSION["user"], "email");
$_SESSION["email"] = $email;

$code = searchData("username", $_SESSION["user"], "code");
$_SESSION["code"] = $code;
?>

<?php
newsOut();
?>

<script>
    function openMenu() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
</script>
</body>
</html>
