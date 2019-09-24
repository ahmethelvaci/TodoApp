<?php

namespace TodoApp\Business\TodoList;

use TodoApp\Application;
use TodoApp\Entity\TodoList;

class NewTodoList
{

    public function handle()
    {
        $app = Application::init();
        $app->set('todoList', new TodoList());
    }
}
