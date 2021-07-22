<!doctype html>

<html lang="de">
<head>
    <?php
    spl_autoload_register(function ($className) {
        error_log('autoloader:' . $className);
        include 'classes/' . $className . '.php';
    });

    Head::printHead("Login","css/styleLogin");
    session_start();
    ?>

</head>

<body>

<h1>Anmelden</h1>
<form action="" method="post">
    <input type="text" placeholder="Username" name="username">
    <input type="password" placeholder="Password" name="password">
    <button type="submit" name="send">Anmelden</button>
</form>
<?php



spl_autoload_register(function ($className) {
    error_log('autoloader:'.$className);
    include 'classes/'.$className.'.php';
});


$datenbank = SchoolExchangeServices::getInstance()->getMariadb();


if (isset($_POST["send"])) {
    $pdo = $datenbank->pdo();

    $rawPassword = $_POST["password"];
    $username = $_POST["username"];
    $password = md5($rawPassword);



    if (isset($res)) {
        echo $res;
    }

    $checkUserByName = SchoolExchangeServices::getInstance()->getMariadb()->findUserByName($username,$password);



    if ($checkUserByName) {
        $_SESSION["userID"] = $checkUserByName->getID();
        header('Location:load.php');
    } else {
        echo '<h3>Der Benutzername oder das Passwort ist falsch</h3>';
    }

}



if (isset($_SESSION["noRights"])) {
    if ($_SESSION["noRights"] == true) {
        echo "<h3>Dein Acc wurde wahrscheinlich gebannt!</h3>";
    } else {
        $_SESSION["noRights"] = false;
    }
}

if () {
}
?>

if
</body>
</html>
