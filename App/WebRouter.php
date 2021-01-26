<?php 
namespace App;
use \Closure;
/**
 * @author Earl Sabalo
 * 
 * This class is responsible defining new routes without creating classes;
 * 
 */


class WebRouter {

    public $routes;

    function __construct() {
        $this->routes = [];
    }
    /**
     * This Function Creates A New Route Without Having to Create Controller Class
     * 
     * @param string $uri the desired uri to request
     * 
     * @param callable $cb a function that needs to be executed
     * 
     * @return void 
     */
    public function createNewRoute($uri, $cb) {
        $uri = str_replace('/', '', $uri);
        $this->routes[$uri] = $cb;
    }
}