<?php 
namespace App;

use Interfaces\MiddlewareInterface;

/**
 * @author Earl Sabalo
 * 
 * This class is responsible defining new routes without creating classes;
 * 
 */

class WebRouter {

    public $routes;

    public $middlewares;

    protected $route_uri;

    function __construct() {
        $this->routes = [];
        $this->middlewares = [];
    }

    /**
     * Create a GET route
     * 
     * @param string $uri the desired uri to request
     * 
     * @param callable $cb a function that needs to be executed
     * 
     * @return $this 
     */
    public function get($uri, $cb) 
    {
        $uri = preg_replace('/\{([a-z]+)\}/', '(?P<$1>\w+)', $uri);
        $uri = str_replace('/', '\/', $uri);
        $this->route_uri = $uri;
        
        $this->routes['GET'][$uri] = $cb;

        return $this;
    }

    /**
     * Create a POST route
     * 
     * @param string $uri the desired uri to request
     * 
     * @param callable $cb a function that needs to be executed
     * 
     * @return $this
     */
    public function post($uri, $cb) 
    {
        
        $uri = preg_replace('/\{([a-z]+)\}/', '(?P<$1>\w+)', $uri);
        $uri = str_replace('/', '\/', $uri);
        $this->route_uri = $uri;
        $this->routes['POST'][$uri] = $cb;

        return $this;
    }

    /**
     * Create a resource route
     *  This has to be rethinked. currently unused.
     * 
     * @param string $uri the desired uri to request
     * 
     * @param object $cb a function that needs to be executed
     * 
     * @return $this
     */
    public function resource($uri, $class) 
    {
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

        $uri = preg_replace('/\{([a-z]+)\}/', '(?P<$1>\w+)', $uri);
        $uri = str_replace('/', '\/', $uri);

        $this->route_uri = $uri;

        $class_methods = get_class_methods($class);

        if ( is_subclass_of($class, 'App\Controller') ) {
            foreach ($class_methods as $method) {
                if ( in_array($method, $get_methods) ) {

                    if ( $method == 'index' ) {
                        $this->routes['GET'][$uri] = [$class, $method];
                    } else {
                        $this->routes['GET'][$uri . '\/' . $method] = [$class, $method];
                    }

                } else if ( in_array($method, $post_methods) ) {

                    if ( $method == 'store' ) {
                        $this->routes['POST'][$uri] = [$class, $method];
                    } else {
                        $this->routes['POST'][$uri . '\/' . $method] = [$class, $method];
                    }
                }
            }
        }

        return $this;
    }

    /**
     * TODO: fix implementation of middleware
     * This adds middlewares to the routes
     * 
     * @param MiddlewareInterface $middleware
     * 
     * @return response()
     */
    public function middleware(MiddlewareInterface $middleware) 
    {
        $this->middlewares[$this->route_uri] = $middleware;
    }
}