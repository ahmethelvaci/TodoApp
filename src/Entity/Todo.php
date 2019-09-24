<?php

namespace TodoApp\Entity;

use TodoApp\Entity\Todo\Name;

class Todo
{
    private $name;

    public function __construct(string $name = null)
    {
        $this->name($name);
    }

    public function name(string $name = null)
    {
        if (!isset($this->name)) {
            $this->name = new Name();
        }

        if (isset($name)) {
            $this->name->set($name);
        }

        return $this->name->get();
    }
}
