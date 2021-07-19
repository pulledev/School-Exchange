<?php session_start(); ?>
<!doctype html>
<html>
<head>
    <title>Neue Frage</title>
    <meta name="description" content="Our first page">
    <meta name="keywords" content="html tutorial template">
</head>
<body>

<style media="screen">
    .newQuestForm {
        text-align: center;

    }

    #head {
        text-align: center;
        margin-bottom: 6vw;
        font-size: 2vw;
        }

    #submit {
        margin: 2vw;
    }

    #question{
        text-align: center;
        padding-bottom: 2vw;
        font-size: 1.5vw;
    }

</style>

<?php
$db = mysqli_connect("", "root", "", "nwt web");

$quest_ID = filter_var($_GET["ID"], FILTER_SANITIZE_STRING);
$want_reply = filter_var($_GET["want_reply"], FILTER_SANITIZE_STRING);

if ($want_reply == "true") {
?>
    <h1 id="head">Neue Antwort auf:</h1>
<?php

    $qselect = mysqli_query($db, "SELECT quest, head FROM forum_quest WHERE ID = $quest_ID");
    $question_res = mysqli_fetch_assoc($qselect);

    ?><div id="question">Titel: <b><?php echo $question_res["head"]?></b><br>
    Inhalt: <b><?php echo $question_res["quest"]?></b></div>
    <?php


?>

    <form class="newQuestForm" action="" method="post">
        <div class="">
            <div class="">Anonym?</div>
            <input type="checkbox" name="anon" value="Anonym?">
        </div>
        <textarea name="question" placeholder="Deine Antwort" rows="8" cols="80"></textarea><br>
        <button type="submit" name="button" id="submit">Abschicken</button>
    </form>
    <?php

    if (isset($_POST["button"])) {
        echo "Frage wurde gestellt!";
        $reply = $_POST["question"];
        $db = mysqli_connect("localhost", "root", "", "nwt web");
        $res = mysqli_query($db, "INSERT INTO forum_reply(antwort, ID_quest) VALUES('$reply','$quest_ID')");
        header("Location: index.php");
    }

} elseif ($want_reply = "false") {
    ?><h1 id="head">Neue Frage:</h1><?php

    ?>
    <form class="newQestForm" action="" method="post">
        <input type="text" name="headline" placeholder="Überschrift">
        <select class="" name="sort">
            <option value="Mathe">Mathe</option>
            <option value="Informatik">Informatik</option>
            <option value="Naturwissenschaft">Naturwissenschaft</option>
            <option value="Technik">Technik</option>
        </select>
        <div class="">
            <div class="">Anonym?</div>
            <input type="checkbox" name="anon" value="Anonym?">
        </div>
        <textarea name="question" placeholder="Deine Frage" rows="8" cols="80"></textarea><br>
        <button type="submit" name="button" id="submit">Abschicken</button>
    </form>

    <?php
    if (isset($_POST["button"])) {
        echo "Frage wurde gestellt!";
        $head = $_POST["headline"];
        $quest = $_POST["question"];
        $user = $_SESSION["user"];
        $sort = $_POST["sort"];
        $db = mysqli_connect("localhost", "root", "", "nwt web");
        $res = mysqli_query($db, "INSERT INTO forum_quest(head, quest, user, sort) VALUES('$head','$quest','$user','$sort')");
        header("Location: index.php");
    }
}
?>


</body>
</html>
