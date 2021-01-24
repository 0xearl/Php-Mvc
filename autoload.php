<?php 
/**
 * @author Earl Sabalo
 * 
 * This autoloads all Class inside our folder Classes
 */

spl_autoload_register(function($class_name) {
    include_once("Classes/{$class_name}.php");
 });
