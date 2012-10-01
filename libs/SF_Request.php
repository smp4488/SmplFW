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
		$i = 0;
		

		foreach ($routingFile as $route){
		    $routeURI = !is_null(explode('/', $route['url']))? explode('/', $route['url']) : '/';
		    unset($routeURI[0]);//remove blank spot
		    $routeURI = array_values($routeURI);//reset indexes	
		    $params = array();//reset partial match
		
		    if(count($routeURI) != count($requestURI)){
			continue;
		    }
		    
		    while($i <= count($requestURI))
		    {
			if($requestURI[$i] == $routeURI[$i])
			{
			    
			}elseif (strpos($routeURI[$i], ':') !== false) {
			    $params[$routeURI[$i]] = $requestURI[$i];//add param from url
			}
			$i++;
		    }			
			
		    if($route['url'] == $requestUri || $route['url'] == $requestUri . "/"){
			    $moduleName = !empty($route['param']['module']) ? $route['param']['module'] : null;
			    $action = !empty($route['param']['action']) ? $route['param']['action'] : null;
			    //$params = array_slice($requestURI, 2);	
			    $params = null;
			    $this->module = new SF_Module($moduleName,$action,$params);	
			    var_dump($this->module);
			    exit();
		    }
		    
		}
	}
	

}
?>