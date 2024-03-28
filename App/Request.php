<?php 

namespace App;

/**
 * @author Earl Sabalo
 * 
 * This class Handles all data that are sent by request either by POST or GET
 * 
 * This Is yet to be tested.
 */

 use App\Exceptions\RequestException;

class Request {
    

    public $request;

    function __construct() {
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
    public function get($name) {
        if(!isset($this->request[$name])) {
            throw new RequestException('Error: Request Not Found');
        }

        return $this->request[$name];
    }
}