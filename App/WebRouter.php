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

        if ( substr_count($uri, '/') > 1 ) {
            $uri = ltrim($uri, '/');
        } else {
            $uri = str_replace('/', '', $uri);
        }
        

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
        
        if ( substr_count($uri, '/') > 1 ) {
            $uri = ltrim($uri, '/');
        } else {
            $uri = str_replace('/', '', $uri);
        }

        $this->routes['POST'][$uri] = $cb;
    }

    /**
     * Create a resource route
     *  This has to be rethinked. currently unused.
     * 
     * @param string $uri the desired uri to request
     * 
     * @param object $cb a function that needs to be executed
     * 
     * @return void
     */
    public function resource($uri, $class) {
        $get_methods = [
            'index',
            'create',
            'show',
            'edit',
            'destroy'
        ];

        $post_methods = [
            'store',
            'update',
        ];

        $uri = str_replace('/', '', $uri);

        $class_methods = get_class_methods($class);

        if ( is_subclass_of($class, 'App\Controller') ) {
            foreach ($class_methods as $method) {
                if ( in_array($method, $get_methods) ) {

                    if ( $method == 'index' ) {
                        $this->routes['GET'][$uri] = [$class, $method];
                    } else {
                        $this->routes['GET'][$uri . '/' . $method] = [$class, $method];
                    }

                } else if ( in_array($method, $post_methods) ) {

                    if ( $method == 'store' ) {
                        $this->routes['POST'][$uri] = [$class, $method];
                    } else {
                        $this->routes['POST'][$uri . '/' . $method] = [$class, $method];
                    }
                }
            }
        }
    }
}