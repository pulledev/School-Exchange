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
    <form id="login" action="login.php" method="post">
        <input type="text" name="username" placeholder="Benutzername">
        <input type="password" name="password" placeholder="Passwort"><br>
        <button type="submit" name="send">Anmelden</button>
    </form>
</div>


<?php



spl_autoload_register(function ($className) {
    error_log('autoloader:'.$className);
    include 'classes/'.$className.'.php';
});


$datenbank = new Mariadb();


if (isset($_POST["send"])) {
    $datenbank = new Mariadb();
    $mysqli = $datenbank->mysqli();

    if (!$mysqli) {
        die("Connection failed: " . mysqli_connect_error());
    }


    $rawPassword = $_POST["password"];
    $username = $_POST["username"];
    $password = md5($rawPassword);



    $searchUser = $mysqli->query("SELECT * FROM user WHERE username = $username");
    $searchPassword = $mysqli->query( "SELECT * FROM user WHERE password = $password");

    $checkPassword = false;
    $checkUsername = false;
    $userRows = $searchUser->num_rows();
    $passRows = $searchPassword->num_rows;
    echo $userRows;

    if ($userRows> 0 && $passRows  > 0) {
        $checkUsername = true;
        $checkPassword = true;
    } else {
        echo '<h3>Der Benutzername oder das Passwort ist falsch</h3>';
    }



}
if (isset($checkPassword)) {
    if ($checkPassword == true && $checkUsername == true) {


        $abfrage = $mysqli->query("SELECT * FROM user WHERE ID = 4");

        $_SESSION["user"] = $username;
        $_SESSION["password"] = $rawPassword;

        $_SESSION["acc"] = true;
        header('Location:load.php');
    }
}


if (isset($_SESSION["noRights"])) {
    if ($_SESSION["noRights"] == true) {
        echo "<h3>Dein Acc wurde wahrscheinlich gebannt!</h3>";
    } else {
        $_SESSION["noRights"] = false;
    }
}
?>

</body>
</html>
