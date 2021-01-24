<?php 
use App\Template;
use App\Controller;
use App\Models\TestModel;

Class Test {
    function __construct(){
        $this->template = new Template();
        $this->model = new TestModel();
    }
    
    public function index(){
        return $this->model->test();
    }
}