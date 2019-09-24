<?php

namespace TodoApp;

use TodoApp\Business\Start;

class Application
{
    private static $application;
    private $app;
    private $cmd;

    public function __construct()
    {
        $this->app = [];
        $this->cmd = [];
        $this->setCmd('start', new Start);
    }

    public static function init()
    {
        if (self::$application instanceof Application) {
            return self::$application;
        }
        self::$application = new Application;
        self::$application->start();
        return self::$application;
    }

    public function set($name, $obj)
    {
        $this->app[$name] = $obj;
    }

    public function setCmd($name, $obj)
    {
        if (!isset($this->cmd[$name])) {
            $this->cmd[$name] = $obj;
        }
        // @TODO handle not exist
    }

    public function has($name)
    {
        return isset($this->app[$name]);
    }

    public function hasCmd($name)
    {
        return isset($this->cmd [$name]);
    }

    public function __call($name, $arguments)
    {
        if (array_key_exists($name, $this->app)){
            return $this->app[$name]; 
        }
        if (array_key_exists($name, $this->cmd)){
            $this->cmd[$name]->handle($arguments); 
        }
    }
}
  