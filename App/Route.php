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
     * @internal string CONTROLLER_PATH
     */
	private const CONTROLLER_PATH = './App/Controllers/';
    
    /**
     * @internal string DEFAULT_CLASS Default Controller Class To instantiate 
     */
    private const DEFAULT_CLASS = 'Index';
    
    /**
     * @internal string DEFAULT_METHOD Default Method To Use In That Said Controller Class.
     */
    private const DEFAULT_METHOD = 'index';
    
    /**
     * @var array $uri the full request uri.
     */
    protected $uri;

    protected $args;

    protected $request_method;
	
	function __construct() 
    {
        parent::__construct();
        $this->uri = explode( '/', substr( $_SERVER['REQUEST_URI'], 1) );
        $this->uri = preg_replace('/\?.*/', '', $this->uri);
        $this->args = new Request();
        $this->request_method = $_SERVER['REQUEST_METHOD'];
	}

	public function loadRoutes()
    {

		if ( count($this->uri) > 0 && !empty( $this->uri[0] ) ){  

            $setClass = ucfirst(strtolower($this->uri[0])); //refers to the Controller to use
            $setMethod = $this->uri[1] ?? self::DEFAULT_METHOD; //refers to what method in that controller to use
        
        } else {
            $setClass = self::DEFAULT_CLASS;
            $setMethod = self::DEFAULT_METHOD;
        }

		//checks if the controller exists in the CONTROLLER_PATH
		if(!file_exists(self::CONTROLLER_PATH . $setClass . '.php')){
			$setClass = self::DEFAULT_CLASS;
		}

		require_once(self::CONTROLLER_PATH . $setClass . '.php');

        $test = "App\\Controllers\\" . $setClass;

        $class = new $test;

        $callable = [$class, $setMethod];

        $callable = is_callable($callable);

		//checks if the method supplied is empty or doesn't exists in the said Controller
		if (empty($setMethod) || !method_exists( $class, $setMethod ) ) {
			$setMethod = self::DEFAULT_METHOD;
		}
        

        if( array_key_exists( $this->uri[0], $this->routes[$this->request_method] ) ) {

            echo call_user_func( $this->routes[ $this->request_method ][ $this->uri[0] ], $this->args);
            die;

        } else if ( $callable && array_key_exists( $this->uri[0] . '/' . $setMethod, $this->routes[$this->request_method] ) ) {

            echo call_user_func( [$class, $setMethod], $this->args);
            die;

        } else {

            return response('Page not Found', 404);

        }
        
    }
}