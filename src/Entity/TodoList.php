<?php

namespace TodoApp\Entity;

use Iterator;
use TodoApp\Interface\Entity;

class TodoList implements Entity, Iterator
{
    private $position = 0;
    private $todos;

    public function __construct(...$todos)
    {
        $this->position = 0;
        $this->todos = [];
        if (isset($todos) && is_array($todos) && count($todos) > 0) {
            foreach ($todos as $todo) {
                if ($todo instanceof Todo) {
                    $this->add($todo);
                }
            }
        }
    }

    public function add(Todo $todo)
    {
        $this->todos[] = $todo;
    }

    public function remove($position)
    {
        if (isset($this->todos[$position])) {
            unset($this->todos[$position]);
            $this->reset();
        }
    }

    public function get()
    {
        return $this->todos;
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function current(): Todo
    {
        return $this->todos[$this->position];   
    }

    public function key(): int
    {
        return $this->position;
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function valid(): bool
    {
        return isset($this->todos[$this->position]);
    }

    private function reset() 
    {
        $todos = [];
        foreach($this->todos as $todo) {
            $todos[] = $todo;
        }
        $this->todos = $todos;
    }
}
