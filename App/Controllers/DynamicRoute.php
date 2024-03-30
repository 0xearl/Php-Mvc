<?php 

namespace App\Controllers;

use App\Controller;

class DynamicRoute extends Controller
{
    public static function index($id)
    {
        return "ID: $id";
    }

    public static function show($name)
    {
        return "Name: $name";
    }
}