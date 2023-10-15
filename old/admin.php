<?php

use classes\Head;
use classes\Navbar;
use classes\NewModal;

require "init.php";
Head::printHead("Admin Panel","css/admin.css");
?>

<!doctype html>
<html lang="de">
<body>
<?php
Navbar::printNavbar("adminPanel");
?>
<div class="container">
    <h1 class="head">Admin Panel</h1>

    <div class="block">
        <div class="d-grid gap-2">
            <button type="button" class="btn btn-primary" id="longQuestion" data-bs-toggle="modal"
                    data-bs-target="#newUserModal">
                Neuen Benutzer anlegen
            </button>
        </div>
    </div>
    <?php NewModal::newUserModal(); ?>


    <div class="block">
        <div class="d-grid gap-2">
            <button type="button" class="btn btn-primary" id="longQuestion" data-bs-toggle="modal"
                    data-bs-target="#deleteUserModal">
                    Nutzer löschen
            </button>
        </div>
    </div>
    <?php NewModal::deleteUserModal(); ?>
    <?php
        if ($_POST["delete"]){
            header("Location:login.php");
        }
    ?>
</div>

</body>
</html>