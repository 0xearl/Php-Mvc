<?php 

namespace App;

use App\WebRouter;
use App\Request;

/**
 * @author Earl Sabalo
 * 
 * This Class Handles The Web Routing.
 */

class Route extends WebRouter {

    /**
     * @var string $uri the full request uri.
     */
    protected $uri;

    protected $request_method;
	
	function __construct() 
    {
        parent::__construct();
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->uri = preg_replace('/\?.*/', '', $this->uri); // Remove Query String
        $this->request_method = $_SERVER['REQUEST_METHOD'];
	}

	public function loadRoutes()
    {

        $matched_route = $this->match();

        $middleware = $this->getMiddleware();

        if ( $matched_route === null ) {
            return response(404);
        }

        if ( $matched_route[1] ) {

            if ( $middleware ) {
                if ( $middleware::call() ) {
                    return call_user_func_array( $matched_route[0], $matched_route[1] );
                }
            } else {
                return call_user_func_array( $matched_route[0], $matched_route[1] );
            }

        } else {

            if ( $middleware ) {
                if ( $middleware::call() ) {
                    return call_user_func( $matched_route[0], new Request() );
                }
            } else {
                return call_user_func( $matched_route[0], new Request() );
            }
            
        }
    }

    private function match()
    {
        if (!isset($this->routes[$this->request_method])) {
            return null;
        }

        foreach ($this->routes[$this->request_method] as $route => $action) {
            $matchResult = preg_match('/^' . $route . '$/', $this->uri, $matches);
            if ($matchResult) {
                array_shift($matches); // Remove the first element from $matches
                $param = array_filter($matches, 'is_int', ARRAY_FILTER_USE_KEY);
                return [$action, $param];
            }
        }

        return null;
    }


    /**
     * This function gets the middleware of the route if it exists.
     * 
     * @return App\Interfaces\MiddlewareInterface|false
     */
    private function getMiddleware()
    {
        foreach ( $this->middlewares as $route => $middleware ) {

            $matchResult = preg_match('/^' . $route . '$/', $this->uri);
            if ( $matchResult ) {
                return $middleware;
            }

            return false;
        }
    }
}