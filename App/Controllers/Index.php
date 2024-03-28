<?php

use App\Controller;
use App\Models\TestModel;
use App\Request;

/**
 * @author Earl Sabalo
 * 
 * This is Index Controller
 */

class Index extends Controller
{

    public static function index(Request $request)
    {
        view('index');
    }

    public static function test()
    {
        $test = new TestModel();
        return $test->test();
    }
}
