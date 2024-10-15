<?php

namespace TodoApp;

use TodoApp\Start;
use TodoApp\Interface\Application as InterfaceApplication;

class Application implements InterfaceApplication
{
    private static Application|null $application = null;
    private array $app = [];
    private array $cmd = [];

    private function __construct()
    {}

    public static function init()
    {
        if (self::$application instanceof Application) {
            return self::$application;
        }
        self::$application = new Application;
        self::$application->start();
        return self::$application;
    }

    private function start()
    {
        Start::addCommands($this);
        $this->new();
    }

    public function set($name, $obj): void
    {
        $this->app[$name] = $obj;
    }

    public function setCmd($name, $obj): void
    {
        if (!isset($this->cmd[$name])) {
            $this->cmd[$name] = $obj;
        }
        // @TODO handle not exist
    }

    public function has($name): bool
    {
        return isset($this->app[$name]);
    }

    public function hasCmd($name): bool
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
  