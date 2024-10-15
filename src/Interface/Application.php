<?php

namespace TodoApp\Interface;

interface Application
{
    public static function init();

    public function set(string $entityName, Entity $entityObject);

    public function setCmd(string $commandName, Command $commandObject);

    public function has(string $entityName);

    public function hasCmd(string $commandName);
}
  