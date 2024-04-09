<?php 

namespace Interfaces;

interface MiddlewareInterface
{
    /**
     * @return bool
     */
    public static function handle();

    /**
     * @return response()
     */
    public static function call();
}