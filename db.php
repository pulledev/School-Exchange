
<?php
/**
 * @var $mysqli mysqli
 */

$host = "localhost";
$name = "school exchange";
$user = "root";
$passwort = "mariadb";

$mysqli = new mysqli($host, $user, $passwort, $name);
$PDO = new PDO("mysql:host=$host;dbname=$name", $user, $passwort);
$test = 1;
?>
