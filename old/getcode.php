<!doctype html>

<html lang="de">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Code bekommen</title>
  <meta name="Paul Treier" content="Exchange">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,500;1,400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/stylegetcode.css">

</head>

<body>
  <div class="headlinec">
    <h1 id="headline">Join us!</h1>
  </div>

  <div id="getcodesquare"></div>
  <div id="sidesquare"></div>
  <a href="index.php" id="side">zurück</a>


    <div class="qeingabec">
      <form class="qeingabe" action="" method="post">
        <input type="text" name="name" placeholder="Name">
        <input type="email" name="email" placeholder="Email">

        <select name="def oder q">
          <option value="Frage">Frage</option>
          <option value="Definition">Definition</option>
        </select>

        <button type="submit" name="submit">Abschicken</button><br>
        <textarea name="frage" rows="8" cols="80"placeholder="Definition oder Frage eingeben"></textarea><br>
        <textarea name="antwort" rows="8" cols="80" placeholder="Antwort eingeben"></textarea>
      </form><br>
    </div>







    <?php
    spl_autoload_register(function ($className) {
        error_log('autoloader:'.$className);
        include 'classes/'.$className.'.php';
    });
    require('db.php');


    if (isset($_POST["submit"])){
      $email = $_POST["email"];
      $name = $_POST["name"];
      $frage = $_POST["frage"];
      $antwort = $_POST["antwort"];




      $absenden = $mysqli->prepare("INSERT INTO get_code (email,name,question,answer) VALUES (?,?,?,?)");
      $absenden->bind_param("ssss",$email,$name,$frage,$antwort);
      $absenden->execute();
    }
     ?>





</body>
</html>
