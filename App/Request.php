<?php 

namespace App;

use App\Exceptions\RequestException;

class Request {
    
    public $request;

    function __construct() {
        $this->request = $_REQUEST;
    }

    /**
     * This Function Returns The Value of an input with
     * the supplied name.
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

        $value = $this->request[$name];

        // Validate and sanitize the input value
        $value = filter_var($value, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        return $value;
    }
}