<?php 
namespace App;

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
     * Create a GET route
     * 
     * @param string $uri the desired uri to request
     * 
     * @param callable $cb a function that needs to be executed
     * 
     * @return void 
     */
    public function get($uri, $cb) {
        $uri = str_replace('/', '', $uri);

        $this->routes['GET'][$uri] = $cb;
    }

    /**
     * Create a POST route
     * 
     * @param string $uri the desired uri to request
     * 
     * @param callable $cb a function that needs to be executed
     * 
     * @return void
     */
    public function post($uri, $cb) {
        $uri = str_replace('/', '', $uri);

        $this->routes['POST'][$uri] = $cb;
    }

    /**
     * Create a resource route
     *  This has to be rethinked. currently unused.
     * 
     * @param string $uri the desired uri to request
     * 
     * @param callable $cb a function that needs to be executed
     * 
     * @return void
     */
    public function resource($uri, $cb) {
        $uri = str_replace('/', '', $uri);

        $this->routes['GET'][$uri] = $cb;
        $this->routes['POST'][$uri] = $cb;
    }
}