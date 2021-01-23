<?php 

/**
 * @author Earl Sabalo
 * 
 * This Class Handles The Templating Function.
 */

class Template {

    /**
     * @internal VIEW_PATH
     */
    const VIEW_PATH = './Views/';
    
    /**
     * @internal TEMPLATE_EXTENSION
     */
    const TEMPLATE_EXTENSION = '.temp.php';


    public function view($filename) {
        if(!file_exists(self::VIEW_PATH . $filename . self::TEMPLATE_EXTENSION)){
            throw new Exception('Error View Doesn\'t Exist.');
        }
        
        return require_once(self::VIEW_PATH . $filename . self::TEMPLATE_EXTENSION);
    }
}