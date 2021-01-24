<?php
use App\Template;
use App\Controller;
use App\Models\TestModel;
/**
 * @author Earl Sabalo
 * 
 * This is Index Controller
 */

 class Index extends Controller {
     function __construct(){
         $this->template = new Template();
     }
     public function index(){
         $this->template->view('index');
     }

     public function test(){
         $test = new TestModel();
         return $test->test();
     }
 }
