<?php 

Class Test {
    function __construct(){
        $this->template = new Template();
        $this->model = new TestModel();
    }
    
    public function index(){
        return $this->model->test();
    }
}