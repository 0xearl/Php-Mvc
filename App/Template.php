<?php 
namespace App;

/**
 * @author Earl Sabalo
 * 
 * This Class Handles The Templating Function.
 */

 use App\Exceptions\TemplateException;

class Template {

    /**
     * @internal VIEW_PATH
     */
    const VIEW_PATH = './App/Views/';
    
    /**
     * @internal TEMPLATE_EXTENSION
     */
    const TEMPLATE_EXTENSION = '.temp.php';


    public function render($filename) {
        if(!file_exists(self::VIEW_PATH . $filename . self::TEMPLATE_EXTENSION)){
            throw new TemplateException('Error View Doesn\'t Exist.');
        }
        
        return require_once(self::VIEW_PATH . $filename . self::TEMPLATE_EXTENSION);
    }
}