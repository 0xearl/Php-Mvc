<?php 

/**
 * @author Earl Sabalo
 * 
 * This Class Handles The Web Routing.
 */

class Route {

	const CONTROLLER_PATH = './Controllers/';
	const DEFAULT_CLASS = 'Index';
	const DEFAULT_METHOD = 'index';

	protected $args = [];
	
	function __construct() {
		$this->uri = explode('/', substr($_SERVER['REQUEST_URI'], 1));
	}

	public function loadRoutes(){
		if(count($this->uri) > 0 && !empty($this->uri[0])){
			$setClass = ucfirst(strtolower($this->uri[0])); //refers to the Controller to use
			$setMethod = $this->uri[1] ?? self::DEFAULT_METHOD; //refers to what method in that controller to use

			//This line handles the arguments being passed
			//ex: ?abc=asd
			//This Passes all the argument given to the controller and method.

			if(strrpos($setMethod, '?')){
				$position = strrpos($setMethod, '?');
				$newMethod = substr($setMethod, 0, $position);
				$setMethod = str_replace('/', '', $newMethod);
			}

			for($ctr = 2; $ctr < count($this->uri); $ctr++){
				array_push($this->args, $this->uri[$ctr]);
			}
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

		call_user_func(array($class, $setMethod), $this->args);
	}
}