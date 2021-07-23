<?php

require "init.php";
$id = SchoolExchangeServices::getInstance()->getSessionManager()->getLoggedInUser();
if (!$id) {
    header("Location: login.php");
}

Head::printHead("test", "");
Navbar::printNavbar("home");