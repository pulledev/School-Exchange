<?php
spl_autoload_register(function ($className) {
    error_log('autoloader:' . $className);
    include 'classes/' . $className . '.php';
});
SchoolExchangeServices::getInstance()->getSessionManager()->getLoggedInUser();