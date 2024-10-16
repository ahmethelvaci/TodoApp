<?php

namespace TodoApp\Command;

use Exception;
use TodoApp\Application;
use TodoApp\Entity\Todo;
use TodoApp\Interface\Command;

class AddTodoCommand implements Command
{
    public function handle($arg)
    {
        if (count($arg) == 0 || empty($arg[0])) {
            throw new Exception("addTodo command must has a name argument");
        }
        $name = $arg[0];
        $app = Application::init();
        if (!$app->has('todoList')) {
            throw new Exception("TodoList Not Found");
        }
        $todoList = $app->todoList();
        $todo = new Todo();
        $todo->name($name);
        $todoList->add($todo);
    }
}
