
<?php
/**
 * @var $mysqli mysqli
 */

$host = "localhost";
$name = "school exchange";
$user = "root";
$passwort = "mariadb";

$PDO = new PDO("mysql:host=$host;dbname=$name", $user, $passwort);
$test = 1;
?>
