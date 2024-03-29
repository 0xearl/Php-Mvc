<?php

namespace App;

class Cookie
{
    public function set($key, $value, $time = 3600)
    {
        setcookie($key, $value, time() + $time, '/');
    }

    public function get($key)
    {
        return $_COOKIE[$key] ?? null;
    }

    public function remove($key)
    {
        setcookie($key, '', time() - 3600, '/');
    }
}