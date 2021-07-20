<?php
spl_autoload_register(function ($className) {
    error_log('autoloader:'.$className);
    include 'classes/'.$className.'.php';
});


Head::printHead("test", "");
Navbar::printNavbar("home");