<?php

namespace TodoApp\Entity\Todo;

class Name 
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
