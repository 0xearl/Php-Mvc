<?php 

namespace App\Controllers;

use App\Controller;
use App\Models\TestModel;

Class Test extends Controller 
{
    
    public static function index()
    {
        $test = new TestModel();
        $data = $test->test();
        return view('test', ['name' => $data]);
    }
}