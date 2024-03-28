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
        return 'this is view';
    }

    public static function store(Request $request)
    {
        return 'this is store';
    }

    public static function update(Request $request)
    {
        return 'this is update';
    }
}
