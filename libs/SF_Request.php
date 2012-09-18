<?php
class SF_Request{
	
	function SF_Request(){
		$requestURI = explode('/', $_SERVER['REQUEST_URI']);
		$scriptName = explode('/',$_SERVER['SCRIPT_NAME']);
		unset($requestURI[0]);//remove blank spot
		$requestURI = array_values($requestURI);//reset indexes
		//var_dump($_SERVER['REQUEST_URI']);
		//var_dump($requestURI);
		//TODO - Add route config check
		$this->checkRoute();
		

		//
		
	}
	
	function getModule(){
		return $this->module;
	}
	
	function checkRoute(){

		$routingFile = Spyc::YAMLLoad('./config/SF_Routing.yml');
		$requestUri = $_SERVER['REQUEST_URI'];
		
		foreach ($routingFile as $route){
			if($route['url'] == $requestUri || $route['url'] == $requestUri . "/"){
				//var_dump($route);
				$moduleName = !empty($route['param']['module']) ? $route['param']['module'] : null;
				$action = !empty($route['param']['action']) ? $route['param']['action'] : null;
				//$params = array_slice($requestURI, 2);	
				$params = null;
				//var_dump($moduleName,$action,$params);
				$this->module = new SF_Module($moduleName,$action,$params);	
			}
		}
	}
	

}
?>