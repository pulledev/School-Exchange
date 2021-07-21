<?php


class Config
{
    private $cfg;

    /**
     * Config constructor.
     */
    public function __construct()
    {
        $this->cfg = parse_ini_file("../config.ini");

    }

    function getValue($name)
    {
        return $this->cfg[$name];
    }
}