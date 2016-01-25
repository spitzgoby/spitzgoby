<?php

namespace App\Helper;

class Helper {
    public static function set_active($route)
    {
        return (\Request::is($route.'/*') || \Request::is($route)) ? "active" : 'inactive';
    }

    public static function markdown_path()
    {
        return public_path() .'/md';
    }

    public static function html_path()
    {
        return public_path() .'/html';
    }
}