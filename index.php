
<!doctype html>
<html lang="de">
<?php

?>


<body>
<div class="container-md">
<h1>Willkommen auf NWT Exchange</h1>
<h3>Die Community Lernplattform </h3>
<br>
<br>
<h4>Wähle unter folgenden aus:</h4>
<hr>
<div class="row">
    <div class="col"><a class="btn btn-primary" href="login.php">login</a><br></div>
    <div class="col"><a class="btn btn-primary" href="register.php">du hast einen Code</a><br></div>
    <div class="col"><a class="btn btn-primary" href="getcode.php">join!</a><br></div>
</div>


</div>
<?php
spl_autoload_register(function ($className) {
    error_log('autoloader:'.$className);
    include 'classes/'.$className.'.php';
});
?>

</body>
</html>