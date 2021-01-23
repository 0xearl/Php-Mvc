<?php
include_once('../Classes/Template.php'); 
/**
 * @author Earl Sabalo
 * 
 * This is Index Controller
 */
 class Index {
     function __construct(){
         $this->template = new Template();
     }
     public function index(){
         $this->template->view('index');
     }
 }