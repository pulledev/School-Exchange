<?php


namespace classes;

use classes\Config;
use classes\Mariadb;
use classes\SessionManager;

class SchoolExchangeServices
{
    private SessionManager $sessionManager;
    private Config $config;
    private Mariadb $mariadb;
    private static ?SchoolExchangeServices $instance = null;

    /**
     * SchoolExchangeServices constructor.
     */
    private function __construct()
    {
        $this->config = new Config();
        $this->mariadb = new Mariadb($this->config);
        $this->sessionManager = new SessionManager($this->mariadb);
    }

    /**
     * @return null
     */
    public static function getInstance(): SchoolExchangeServices
    {
        if (self::$instance == null) {
            self::$instance = new SchoolExchangeServices();
        }
        return self::$instance;
    }

    /**
     * @return mixed
     */
    public function getConfig(): Config
    {
        return $this->config;
    }

    /**
     * @return mixed
     */
    public function getMariadb(): Mariadb
    {
        return $this->mariadb;
    }

    /**
     * @return SessionManager
     */
    public function getSessionManager(): SessionManager
    {
        return $this->sessionManager;
    }


}