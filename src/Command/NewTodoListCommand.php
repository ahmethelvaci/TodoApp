<?php

namespace TodoApp\Command;

use TodoApp\Application;
use TodoApp\Entity\TodoList;
use TodoApp\Interface\Command;

class NewTodoListCommand implements Command
{

    public function handle()
    {
        $app = Application::init();
        $app->set('todoList', new TodoList());
    }
}
