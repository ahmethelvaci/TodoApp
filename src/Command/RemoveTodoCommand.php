<?php

namespace TodoApp\Command;

use Exception;
use TodoApp\Application;
use TodoApp\Interface\Command;

class RemoveTodoCommand implements Command
{
    public function handle($arg)
    {
        if (count($arg) == 0 || !is_int($arg[0])) {
            throw new Exception("removeTodo command must has a key argument");
        }
        $position = $arg[0];
        $app = Application::init();
        if (!$app->has('todoList')) {
            throw new Exception("TodoList Not Found");
        }
        $todoList = $app->todoList();
        $todoList->remove($position);
    }
}
