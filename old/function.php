<?php
spl_autoload_register(function ($className) {
    error_log('autoloader:'.$className);
    include 'classes/'.$className.'.php';
});
function searchData($from, $input, $output)
{
    // from = Spalte input
    // input = was soll es sein
    // output = welche Spalte ausgegeben wird
    $stmt = $mysqli->prepare("SELECT * FROM user WHERE $from = :value");
    $stmt->bindParam(":value", $input, PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->fetch();
    return $row[$output];
}

function newsOut()
{


    $abfrage = $mysqli->query("SELECT * FROM news ORDER BY ID DESC");


    while ($ausgabe = $abfrage->fetch_object()) {

        echo "
    Titel: <b>" . $ausgabe->header . "</b><br>
    Nachricht:<br><b>" . $ausgabe->content . "</b><br><br>
    Abgesendet am <b>" . date("d.m.Y H:i:s") . "</b> Uhr<br>
    ________________________________________________<br>

    ";

    }
}

function whichImage($subject, $ID)
{
    if ($subject == "informatics") {
        ?><img id="<?php $ID ?>" src="pic/infomatik.png" alt="Informatik Bild"><?php
    } elseif ($subject == "math") {
        ?><img id="<?php $ID ?>" src="pic/mathematik.png" alt="Mathe Bild"><?php
    } elseif ($subject == "science") {
        ?><img id="<?php $ID ?>" src="pic/biologie.png" alt="Naturwissenschaft Bild"><?php
    } elseif ($subject == "tech") {
        ?><img id="<?php $ID ?>" src="pic/technik.png" alt="Technik Bild"><?php
    }
}

function whichText($subject, $ID)
{
    if ($subject == "informatics") {
        ?>Informatik<?php
    } elseif ($subject == "math") {
        ?>Mathe<?php
    } elseif ($subject == "science") {
        ?>Biologie<?php
    } elseif ($subject == "tech") {
        ?>Technik<?php
    }
}

?>
