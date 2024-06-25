<?php
// app/Helpers/helpers.php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

if (!function_exists('isActiveRoute')) {
    function isActiveRoute($route, $output = 'active')
    {
        if (Route::currentRouteName() == $route) {
            return $output;
        }
        return '';
    }
}

if (!function_exists('isActivePath')) {
    function isActivePath($path, $output = 'active')
    {
        if (Request::is($path)) {
            return $output;
        }
        return '';
    }
}
