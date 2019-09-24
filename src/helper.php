<?php

if (!function_exists('dd')) {
    function dd(...$arg)
    {
        print_r($arg);
        exit;
    }
}