<!doctype html>
<?php session_start(); ?>
<html lang="de">
<head>
    <link rel="shortcut icon" href="pic/favicon.png" type="image/png" />
    <link rel="icon" href="pic/favicon.png" type="image/png" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Einstellungen</title>
    <link rel="stylesheet" href="../css/stylesettings.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,500;1,400&display=swap" rel="stylesheet">
    <link href="https://allfont.net/allfont.css?fonts=league-spartan" rel="stylesheet" type="text/css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,700;1,100;1,300;1,400;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>


<div class="headc"><h1 id="head">Einstellungen</h1></div>

<a href="home.php" class="icon"><span class="material-icons">arrow_back</span></a>


<h2 id="typehead">Persönliche Infos:</h2>

<div class="flexBoxInfos">
    <div class="flexBoxInfos1">
        <div class="kachelc">
            <h3 class="tileheadc">Dein Name:</h3>
            <div class="tilecontent">
                <?php echo '<b>' . $_SESSION["user"] . '</b><br>'; ?>
                <form class="" action="" method="post">
                    <button type="submit" name="changeuser">ändern</button>
                </form>
            </div>
        </div>
    </div>
    <div class="flexBoxInfos2">
        <div class="kachelc">
            <h3 class="tileheadc">Deine Email:</h3>
            <div class="tilecontent">
                <?php echo '<b>' . $_SESSION["email"] . '</b>'; ?>
            </div>
        </div>
    </div>
</div>
<div class="placeholder"></div>
<div class="flexBoxInfos">
    <div class="flexBoxInfos3">
        <div class="kachelc">
            <h3 class="tileheadc">Dein Rang:</h3>
            <div class="tilecontent">
                <?php echo '<b>' . $_SESSION["rank"] . '</b><br>'; ?>
                <form class="" action="" method="post">
                    <input type="text" name="kzu" placeholder="begründung">
                    <button type="submit" name="changerank">Änderung beantragen</button>
                </form>
            </div>
        </div>
    </div>
    <div class="flexBoxInfos4">
        <div class="kachelc">
            <h3 class="tileheadc">Dein Zugangs-Code:</h3>
            <div class="tilecontent">
                <?php echo '<b>' . $_SESSION["code"] . '</b>'; ?>
            </div>
        </div>
    </div>
</div>



<h2 id="typehead">Sicherheit:</h2>

<div class="flexBoxSafe">
    <div class="flexBoxSafe1">
        <div class="kachelc">
            <h3 class="tileheadc">Passwort ändern:</h3>
            <form class="" action="" method="post">
                <button type="submit" name="getpwreset">Beantragen</button>
            </form>
        </div>
    </div>

    <div class="flexBoxSafe2">
        <div class="kachelc">
            <h3 class="tileheadc">Konto löschen</h3>
            <form class="" action="" method="post">
                <button type="submit" name="getdelete">Beantragen</button>
            </form>
        </div>
    </div>
</div>





   <div>
       <h2 id="typehead">Datenschutz:</h2>

       <div class="flexBoxData">
           <div class="flexBoxData1">
               <div class="kachelc">
                   <h3 class="tileheadc">Cookies:</h3>
                    <h4 class="tilecontent">Hier werden fast keine Daten gespeichert, außer Session Cookies die aber wichtig sind, und
                   laut DSGVO nichtmal genannt werden müssen! Mehr Infos:</h4>
                   <a href="https://www.datenschutz.org/session-cookie/" class="tilecontent">Session Cookies</a>
               </div>
           </div>
           <div class="flexBoxData2">
               <div class="kachelc">
                   <h3 class="tileheadc">Daten:</h3>
                   <h4 class="tilecontent">Alle wichtigen Daten (Passwort,Name,Email) werden mit sogenannten Hashes(MD5) verschlüsselt.
                       Diese Hashes sind nur sehr schwer knackbar. Mehr Infos:</h4>
                   <a href="https://www.datenschutz.org/personenbezogene-daten/" class="tilecontent">Personen Bezogene Daten</a><br>
                   <a href="https://de.wikipedia.org/wiki/Kryptographische_Hashfunktion" class="tilecontent">Hashfunktion</a>
               </div>
           </div>
       </div>
   </div>



<?php
spl_autoload_register(function ($className) {
    error_log('autoloader:'.$className);
    include 'classes/'.$className.'.php';
});
require 'db.php';
require 'function.php';

if (isset($_POST["changeuser"])) {
    header("Location:changename.php");
}
if (isset($_POST["getpwreset"])) {
    header("Location:changePw.php");
}
?>
</body>
</html>
