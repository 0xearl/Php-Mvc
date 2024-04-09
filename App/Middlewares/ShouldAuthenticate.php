<?php 

namespace App\Middlewares;

use Interfaces\MiddlewareInterface;


class ShouldAuthenticate implements MiddlewareInterface
{
    /**
     * @return bool
     */
    public static function handle()
    {
        return true;
    }

    /**
     * @return response()
     */
    public static function call()
    {
        if (!self::handle()) {
            return redirect('/');
        }

        return true;
    }
}