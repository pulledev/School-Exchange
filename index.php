
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Willkommen auf NWT Exchange</h1>
<h3>Die Community Lernplattform </h3>
<br>
<br>
<h4>Wähle unter folgenden aus:</h4>
<hr>
<a href="login.php">login</a><br>
<hr>
<a href="register.php">du hast einen Code</a><br>
<hr>
<a href="getcode.php">join!</a><br>
<hr>
<?php
spl_autoload_register(function ($className) {
    error_log('autoloader:'.$className);
    include 'classes/'.$className.'.php';
});
?>
</body>
</html>