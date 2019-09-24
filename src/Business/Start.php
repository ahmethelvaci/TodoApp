<?php

namespace TodoApp\Business;

use TodoApp\Application;
use TodoApp\Business\Todo\AddTodo;
use TodoApp\Business\Todo\RemoveTodo;
use TodoApp\Business\TodoList\NewTodoList;

class Start
{
    public function handle()
    {
        $app = Application::init();
        $this->addCommands();
        $app->new();
    }

    private function addCommands()
    {
        $app = Application::init();
        if (!$app->hascmd('new')) {
            $app->setCmd('new', new NewTodoList);
        }
        if (!$app->hascmd('addTodo')) {
            $app->setCmd('addTodo', new AddTodo);
        }
        if (!$app->hascmd('removeTodo')) {
            $app->setCmd('removeTodo', new RemoveTodo);
        }
    }
}
