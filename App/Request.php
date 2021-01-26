<?php 

namespace App;

/**
 * @author Earl Sabalo
 * 
 * This class Handles all data that are sent by request either by POST or GET
 * 
 * This Is yet to be tested.
 */

class Request {
    
    private $request;

    function construct() {
        $this->request = $_REQUEST;
    }

    /**
     * This Function Returns The Value of an input with
     *              the supplied name.
     * 
     * @param string $name name of the variable passed in request
     * 
     * @throws App\Exceptions\RequestException
     * 
     * @return mixed
     */
    public function getInput($name) {
        switch($this->request) {
            case 'GET':
                if(filter_has_var(INPUT_GET, $name)) {
                    return $_REQUEST[$name];
                }else{
                    throw new App\Exceptions\RequestException("Error input $name doesn't exist.");
                }
                break;
            case 'POST':
                if(filter_has_var(INPUT_POST, $name)) {
                    return $_REQUEST[$name];
                }else{
                    throw new App\Exceptions\RequestException("Error input $name doesn't exist.");
                }
                break;
            default:
                throw new App\Exceptions\RequestException('Error Something Went Wrong');
                break;
        }
    }
}