<?php 

/**
 * @author Earl Sabalo
 * 
 * This is The Main Controller for all Controllers.
 * 
 */

 class Controller {

    /**
     * @internal MODEL_PATH
     */
    const MODEL_PATH = './Models/';

    /**
     * This Function loads the models for every controllers
     * 
     * @param string $modelName Name of The Model;
     * 
     * @throws \Exception Exception.
     * 
     * @return ojbect Models Object
     */
     public function loadModel($modelName) {
         if(file_exists(self::MODEL_PATH . $modelName . '.php')){
             return require_once(self::MODEL_PATH . $modelName . '.php');
         }else{
             throw new \Exception('Model Not Found');
         }
     }
 }