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

    protected $args;

    protected $request_method;

    private $matched_route;
	
	function __construct() 
    {
        parent::__construct();
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->uri = preg_replace('/\?.*/', '', $this->uri); // Remove Query String
        $this->args = null;
        $this->request_method = $_SERVER['REQUEST_METHOD'];
	}

	public function loadRoutes()
    {

        $uri = $this->uri;
        if ( substr_count($this->uri, '/') > 1 ) {
            $uri = ltrim($this->uri, '/');
        } else {
            $uri = str_replace('/', '', $this->uri);
        }

        if( array_key_exists( $uri, $this->routes[$this->request_method] ) ) {

            echo call_user_func( $this->routes[ $this->request_method ][ $uri ], $this->args);
            die;

        } else if ( $this->match() ) {

            $this->dispatcher();

        } else {

            return response(404);

        }
    }

    public function match()
    {
        foreach( $this->routes[$this->request_method] as $route => $cb ) {
            if( str_contains( $route, "(\d)" ) || str_contains(  $route, "(\w+)" ) ) {
                $uri = str_replace('/', '\/', $route);
                $pattern = "/$uri/";

                if( preg_match($pattern, $this->uri, $matches) ) {
                    if ( count( $matches ) > 1 ) {
                        $this->matched_route = $route;
        
                        $this->args = $matches[1];
        
                    } else {
        
                        $this->matched_route = $route;
                        $this->args = new Request();
        
                    }
                    return true;
                }
            }
        }

        return false;
    }

    public function dispatcher()
    {

        if ( array_key_exists( $this->matched_route, $this->routes[$this->request_method] ) ) {
            
            echo call_user_func( $this->routes[ $this->request_method ][ $this->matched_route ], $this->args);
            die;
        }

        return response(404);
    }
}