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
	
	function __construct() 
    {
        parent::__construct();
        $this->uri = $_SERVER['REQUEST_URI'];
        $this->uri = preg_replace('/\?.*/', '', $this->uri); // Remove Query String
        $this->args = new Request();
        $this->request_method = $_SERVER['REQUEST_METHOD'];
	}

	public function loadRoutes()
    {

        $uri = $this->uri;

        if ( substr_count($uri, '/') > 1 ) {
            $uri = ltrim($uri, '/');
        } else {
            $uri = str_replace('/', '', $uri);
        }
        
        if( array_key_exists( $uri, $this->routes[$this->request_method] ) ) {

            echo call_user_func( $this->routes[ $this->request_method ][ $uri ], $this->args);
            die;

        } else {

            return response('Page not Found', 404);

        }
    }
}