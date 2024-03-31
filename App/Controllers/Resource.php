<?php 

namespace App\Controllers;

use App\Controller;
use App\Request;

/**
 * @author Earl Sabalo
 * 
 * This is Index Controller
 */

class Resource extends Controller
{

    public static function index()
    {
        return view('index', ['name' => 'Earl Sabalo']);
    }

    public static function show()
    {
        echo 'this is view';
    }

    public static function store(Request $request)
    {
        echo 'this is store';
    }

    public static function update(Request $request)
    {
        echo 'this is update';
    }
}
