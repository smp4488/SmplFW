<?php
class SF_Request{
	
	function SF_Request(){
		$requestURI = explode('/', $_SERVER['REQUEST_URI']);
		$scriptName = explode('/',$_SERVER['SCRIPT_NAME']);
		unset($requestURI[0]);//remove blank spot
		$requestURI = array_values($requestURI);//reset indexes

		$this->checkRoute($requestURI);
		
	}
	
	function getModule(){
		return $this->module;
	}
	
	function checkRoute($requestURI){

		$routingFile = Spyc::YAMLLoad('./config/SF_Routing.yml');
		$params = array();
		$i = 0;
		

		foreach ($routingFile as $route){
		    $routeURI = !is_null(explode('/', $route['url']))? explode('/', $route['url']) : '/';
		    unset($routeURI[0]);//remove blank spot
		    $routeURI = array_values($routeURI);//reset indexes	
			
		    while($i <= count($requestURI))
		    {

			$i++;
		    }			
			
		    foreach($routeURI as $routePart)
		    {
			if()
			{

			}
		    }
		    if($route['url'] == $requestUri || $route['url'] == $requestUri . "/"){
			    $moduleName = !empty($route['param']['module']) ? $route['param']['module'] : null;
			    $action = !empty($route['param']['action']) ? $route['param']['action'] : null;
			    //$params = array_slice($requestURI, 2);	
			    $params = null;
			    $this->module = new SF_Module($moduleName,$action,$params);	
		    }
		    
		}
	}
	

}
?>