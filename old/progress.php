<!doctype html>
<html lang="de">
<?php

use classes\Head;
use classes\Navbar;

spl_autoload_register(function ($className) {
    error_log('autoloader:' . $className);
    include 'classes/' . $className . '.php';
});
Head::printHead("School Exchange", "/css/styleindex.css");
?>


<body>
<?php
Navbar::printNavbarIndex("home");
?>
<div class="container">

    <h1 class="headline">Wann kommt die neue Version?</h1>

    <h3 class="headline2">Fortschritt</h3>
    <div class="progress" id="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 10%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">10%</div>
    </div>
    <h3 class="headline2">To Do`s</h3>
    <ul class="list-group" >
        <li class="list-group-item active" aria-current="true">An active item</li>
        <li class="list-group-item">A second item</li>
        <li class="list-group-item">A third item</li>
        <li class="list-group-item">A fourth item</li>
        <li class="list-group-item">And a fifth one</li>
    </ul>
</div>
</body>
</html>

