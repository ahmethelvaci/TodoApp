<?php

namespace TodoApp;

use TodoApp\Application;
use TodoApp\Command\AddTodoCommand;
use TodoApp\Command\RemoveTodoCommand;
use TodoApp\Command\NewTodoListCommand;

class Start
{
    public static function addCommands(Application $app)
    {
        if (!$app->hascmd('new')) {
            $app->setCmd('new', new NewTodoListCommand);
        }

        if (!$app->hascmd('addTodo')) {
            $app->setCmd('addTodo', new AddTodoCommand);
        }

        if (!$app->hascmd('removeTodo')) {
            $app->setCmd('removeTodo', new RemoveTodoCommand);
        }
    }
}
