<?php

namespace TodoApp\Entity\Todo;

use TodoApp\Interface\Entity;

class Name implements Entity
{
    private $name;

    public function get()
    {
        return $this->name;
    }

    public function set(string $name)
    {
        $this->name = $name;
    }
}
