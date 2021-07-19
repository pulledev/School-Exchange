<!doctype html>
<html>
<head>
    <title>Fragen-Forum</title>
    <meta name="description" content="Our first page">
    <meta name="keywords" content="html tutorial template">
    <link rel="stylesheet" href="css/stylefo.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,500;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

<h1 id="headline">Forum</h1>
<a href="../home.php">Zurück</a><br>
<?php echo '<a href="newPost.php?want_reply=false">Neue Frage</a>'; ?>


<?php
$db = mysqli_connect("", "root", "", "nwt web");

$res = mysqli_query($db, "SELECT quest, head, sort, user, ID  FROM forum_quest");

$num = mysqli_num_rows($res);

if ($num > 0) {
    ?>
    <br><h3>Fragen:</h3>
    <hr>
    <?php
} else {
    ?>
    <br><h3>Fragen:</h3>
    <h4>//Es gibt zurzeit keine Fragen!//</h4><?php
}

while ($dsatz = mysqli_fetch_assoc($res)) {
    echo 'Titel: <b>' . $dsatz["head"] . '</b><br>User: <b>' . $dsatz["user"] . '</b><br>Fach: <b>' . $dsatz["sort"] . '</b><br>Frage: <b>' . $dsatz["quest"] . '</b><br>';

    $_SESSION["forum_want_reply"] = true;
    echo '<a href="newPost.php?want_reply=true&ID=' . $dsatz["ID"] . '">Du hast eine Antwort?</a><br>';

    $resreply = mysqli_query($db, "SELECT antwort, user  FROM forum_reply WHERE ID_quest = " . $dsatz['ID']);

    ?> <div>Antworten:</div> <?php

    while ($dsatzreply = mysqli_fetch_assoc($resreply)) {
        echo $dsatzreply["antwort"];
        ?><br><?php
    }
    ?> <br><br><hr> <?php
}
?>


</body>
</html>
