
<!doctype html>

<html lang="de">
<head>
    <?php
    session_start();
    ?>

</head>

<body>



<?php



spl_autoload_register(function ($className) {
    error_log('autoloader:'.$className);
    include 'classes/'.$className.'.php';
});


$datenbank = new Mariadb();


if (isset($_POST["send"])) {
    $datenbank = new Mariadb();
    $pdo = $datenbank->pdo();



    $rawPassword = $_POST["password"];
    $username = $_POST["username"];
    $password = md5($rawPassword);

    $searchUser = $pdo->prepare("SELECT * FROM user WHERE password = :pass");
    $searchUser->bindParam(":pass", $password);
    $searchUser->execute();

    $searchPass = $pdo->prepare("SELECT * FROM user WHERE username = :user");
    $searchPass->bindParam(":user", $username);
    $searchPass->execute();

    $rowPass = $searchPass->rowCount();
    $rowUser = $searchUser->rowCount();



    $checkPassword = false;
    $checkUsername = false;
    $searchUserResult = $searchUser;
    $userRows = $searchUser->rowCount();


    if ($rowUser > 0 && $rowPass  > 0) {
        $checkUsername = true;
        $checkPassword = true;
    } else {
        echo '<h3>Der Benutzername oder das Passwort ist falsch</h3>';
    }



}
if (isset($checkPassword)) {
    if ($checkPassword == true && $checkUsername == true) {

        $test = 4;
        $abfrage = $pdo->query("SELECT * FROM user WHERE ID = $test");


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
