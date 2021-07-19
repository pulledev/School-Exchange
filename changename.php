<!doctype html>
<?php session_start();?>
<html lang="de">
<head>
  <meta charset="utf-8">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,500;1,400&display=swap" rel="stylesheet">
  <title>Change Name</title>
  <meta name="Paul Treier" content="SitePoint">


</head>

<body>
  <style media="screen">
    #head{
      text-align: center;
      font-family: 'Roboto Mono', monospace;
      font-weight: bold;
      margin: 3vw;
    }
    .navc{
      text-align: center;
    }
    .textfield{
      text-align: center;
      margin: 8vw;
    }
  </style>



  <h1 id="head">Name ändern</h1>
  <div class="navc"><a href="settings.php" id="nav">zurück</a></div>
  <form class="textfield" action="" method="post">
    <input type="text" name="newName" placeholder="Neuer Name">
    <button type="submit" name="submit">Ändern</button>
  </form>


  <?php
  if (isset($_POST["submit"])){
    $code = $_SESSION["code"];
    $newName = $_POST["newName"];
    $con = new mysqli("localhost","root","","nwt web");
    $sql =  "UPDATE user SET username = '$newName' WHERE code = '$code'";
    $res = mysqli_query($con,$sql);
    echo "Dein neuer Name ist nun: <b>".$newName."</b>";
  }


   ?>
</body>
</html>
