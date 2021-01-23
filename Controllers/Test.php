<?php 

Class Test {
    function __construct(){
        $this->template = new Template();
    }
    
    public function index(){
        return $this->template->view('test');
    }
}