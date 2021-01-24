<?php 
/**
 * @author Earl Sabalo
 * 
 * This autoloads all Class inside our folder Classes
 */

spl_autoload_register(function($class_name) {
    try {
        $class = str_replace('\\', '/', $class_name);
        require_once("$class.php");
    }catch(Exception $e){
        throw new Exception($e->getCode());
    }
});
