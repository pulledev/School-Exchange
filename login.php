<!doctype html>

<html lang="de">

    <?php
    require "init.php";

    Head::printHead("Login","css/styleLogin");
    ?>



<body>

<h1>Anmelden</h1>
<form action="" method="post">
    <label>
        <input type="text" placeholder="Username" name="username">
    </label>
    <label>
        <input type="password" placeholder="Password" name="password">
    </label>
    <button type="submit" name="send">Anmelden</button>
</form>
<?php



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
        error_log("Setting User ID cookie: ".$checkUserByName->getID());
        $_SESSION["userID"] = $checkUserByName->getID();
        header('Location:load.php');
    } else {
        echo '<h3>Der Benutzername oder das Passwort ist falsch</h3>';
    }

}



/*if (isset($_SESSION["noRights"])) {
    if ($_SESSION["noRights"] == true) {
        echo "<h3>Dein Acc wurde wahrscheinlich gebannt!</h3>";
    } else {
        $_SESSION["noRights"] = false;
    }
}*/
?>
</body>
</html>
