<?php 
namespace App;
use App\WebRouter;
use \Closure;
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
	
	function __construct() {
        parent::__construct();
        $this->uri = explode('/', substr($_SERVER['REQUEST_URI'], 1));
	}

	public function loadRoutes(){
		if(count($this->uri) > 0 && !empty($this->uri[0])){  

            $setClass = ucfirst(strtolower($this->uri[0])); //refers to the Controller to use
            $setMethod = $this->uri[1] ?? self::DEFAULT_METHOD; //refers to what method in that controller to use
        
        }else{
            $setClass = self::DEFAULT_CLASS;
        }

		//checks if the controller exists in the CONTROLLER_PATH
		if(!file_exists(self::CONTROLLER_PATH . $setClass . '.php')){
			$setClass = self::DEFAULT_CLASS;
		}

		require_once(self::CONTROLLER_PATH . $setClass . '.php');

		$class = new $setClass();

		//checks if the method supplied is empty or doesn't exists in the said Controller
		if(empty($setMethod) || !method_exists($class, $setMethod)){
			$setMethod = self::DEFAULT_METHOD;
		}
        if(array_key_exists($this->uri[0], $this->routes)){
            echo call_user_func($this->routes[$this->uri[0]]);
            die;
        }
		return call_user_func(array($class, $setMethod), $this->args);
    }
}