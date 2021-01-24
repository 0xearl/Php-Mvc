<?php 
namespace App;

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
    const MODEL_PATH = './App/Models/';

    /**
     * This Function loads the models for every controllers
     * 
     * @param string $modelName Name of The Model;
     * 
     * @throws App\Exceptions Exception.
     * 
     * @return ojbect Models Object
     */
     public function loadModel($modelName) {
         if(file_exists(self::MODEL_PATH . $modelName . '.php')){
             return require_once(self::MODEL_PATH . $modelName . '.php');
         }else{
             throw new App\Exceptions\ControllerException('Model Not Found');
         }
     }
 }