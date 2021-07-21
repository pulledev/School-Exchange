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


$datenbank = new Mariadb();


if (isset($_POST["send"])) {
    $datenbank = new Mariadb();
    $pdo = $datenbank->pdo();

    $rawPassword = $_POST["password"];
    $username = $_POST["username"];
    $password = md5($rawPassword);



    if (isset($res)) {
        echo $res;
    }

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

        $_SESSION["user"] = $username;
        //$_SESSION["password"] = $rawPassword;

        $_SESSION["acc"] = true;

        $res = $pdo->query("SELECT * FROM ");
        $results = [];
        while ($row = $res->fetch()) {
            $results[] = new ForumQuestion($row["quest"], $row["user"], $row["sort"], $row["head"], $row["ID"]);
        }
        error_log("ID des anmeldenden: ".$id);
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
