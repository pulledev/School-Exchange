<?php

use classes\Head;
use classes\Navbar;
use classes\SchoolExchangeServices;

require "init.php";
$id = SchoolExchangeServices::getInstance()->getSessionManager()->getLoggedInUser();
if (!$id) {
    header("Location: login.php");
}

Head::printHead("test", "");
Navbar::printNavbar("home");