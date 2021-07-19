<?php
  session_start();
 ?>
<!doctype html>

<html lang="de"
<head>
  <meta charset="utf-8">

  <title>Admin</title>
  <link rel="stylesheet" href="css/style.css">

</head>

<body>
  <h1>Willkommen auf der Admin-Seite</h1>
  <h2>Hier findest du alles was mit Admin zu tun hat, obwohl das gerade ein Test ist und niemals so aussehen wird :)</h2>
  <h3 id="codeanfragen">Codeanfrage (neuste zuerst):</h3>

  <?php
  spl_autoload_register(function ($className) {
      error_log('autoloader:'.$className);
      include 'classes/'.$className.'.php';
  });
    if ($_SESSION["rank"]<1) {
      header("Location:login.php");
      $_SESSION["noRights"] = true;
    }
    require ("db.php");

    $abfrage = $mysqli->query("SELECT * FROM get_code ORDER BY ID DESC");
    $a=0;
    $b=0;

    if ($abfrage->num_rows==0) {
      echo ("Es gibt keine neuen Anfragen");
    }else{
      $ausgabe=$abfrage->fetch_object();
      echo "<b>Email</b>:" .$ausgabe->email."<br>
      <b>Name: </b>".$ausgabe->name."<br><br>
      <b>Frage: </b>".$ausgabe->question."<br><br>
      <b>Antwort: </b>".$ausgabe->answer."<br><br>
      <b>Abgesendet am: </b>".date("d.m.Y H:i:s")." Uhr
      ";


      echo'<br><br><form method="post"><input type="submit" name="annehmen" value="anehmen"></input></form>';
      echo'<form method="post"><input type="submit" name="ablehnen" value="ablehnen"></input></form><hr><br>';

      if (isset($_POST["ablehnen"])) {
        $statement = $db->prepare("DELETE FROM get_code WHERE ID = (SELECT MAX(ID) FROM get_code)");
        $statement->execute();
      }
      if (isset($_POST["annehmen"])) {



        $code=RandomCode(10);

        $absenden = $db->prepare("INSERT INTO register_code (code) VALUES(?)");
        $absenden->bind_param("s",$code);
        $absenden->execute();

        echo "Hallo ".$ausgabe->name.",<br><br>
        dein Beitrag wurde verifiziert!<br>
        dein Code lautet <b>".$code."</b>.<br>
        Du kannst ihn nun unter:<br>";
        echo '<a href="register.php">NWT EXCHANGE register</a><br>';
        echo "gegen einen Account eintauschen.<br>
        Viel Spaß mit NWT Exchange";

        $statement = $db->prepare("DELETE FROM get_code WHERE ID = (SELECT MAX(ID) FROM get_code)");
        $statement->execute();

      }

    }

    function RandomCode($laenge)
    {
      $zeichen = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","1","2","3","4","5","6","7","8","9","0");
      $ausgabe = "";
      $i = 0;
      while ($i < $laenge) {
    $ausgabe .= $zeichen[rand(0,count($zeichen)-1)];
        $i++;
      }
      return $ausgabe;
    }

   ?>
</body>
</html>
